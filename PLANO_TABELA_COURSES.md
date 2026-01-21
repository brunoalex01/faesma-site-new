# Plano de implementação: nova tabela `courses` baseada em view SQL

## Objetivo
Criar uma nova tabela física `courses` derivada de uma view SQL existente, garantindo consistência, rastreabilidade e performance para consultas e integrações.

## Premissas e dependências
- Existe uma view SQL que representa a estrutura desejada para `courses`.
- O banco de dados permite criação de tabelas a partir de `SELECT` (ex.: `CREATE TABLE AS SELECT`) ou scripts equivalentes.
- Existe ambiente de staging para validação antes de produção.

## Etapas de implementação
1. **Mapear a view atual**
   - Identificar o nome da view e seu `SELECT` completo.
   - Listar todas as colunas, tipos, chaves e regras de negócio implícitas (joins, filtros, cálculos).

2. **Definir o esquema da tabela `courses`**
   - Converter colunas da view para tipos de dados explícitos.
   - Definir chave primária e índices relevantes (por exemplo: `course_id`, `institution_id`, `status`).
   - Validar constraints (NOT NULL, UNIQUE, CHECK) necessárias.

3. **Planejar migração de dados inicial**
   - Criar script de criação da tabela (`CREATE TABLE courses (...)`).
   - Popular a tabela com os dados atuais da view (`INSERT INTO courses (...) SELECT ... FROM view`).
   - Registrar timestamp de carga inicial.

4. **Definir estratégia de atualização**
   - Escolher entre:
     - Atualização incremental (triggers, jobs, CDC) **ou**
     - Recarga periódica completa (ETL agendada).
   - Documentar frequência, janela de execução e impacto.

5. **Validar consistência**
   - Comparar contagens e checksums entre view e tabela.
   - Executar queries de amostra para garantir equivalência.

6. **Ajustar permissões e integrações**
   - Garantir grants para serviços consumidores.
   - Atualizar queries e pipelines que usam a view para apontar para `courses`.

7. **Monitoramento e rollback**
   - Criar métricas (ex.: diferença de contagem, tempo de atualização).
   - Definir plano de rollback (retornar para view original caso necessário).

## Entregáveis
- Script SQL de criação da tabela `courses`.
- Script SQL de carga inicial.
- Documento de estratégia de atualização.
- Checklist de validação e rollback.
