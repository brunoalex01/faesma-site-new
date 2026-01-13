# Database Schema Documentation - FAESMA Website

## Overview

The `faesma_db` is designed for scalability and efficiency, supporting 100+ courses across various categories and modalities. It uses MySQL with InnoDB engine for transaction support and foreign key constraints.

## Entity Relationship Diagram (Conceptual)

- **Courses** belong to **Categories** and **Modalities**.
- **Curriculum** entries link to **Courses**.
- **Students** create **Enrollments** for **Courses**.
- **News** and **Events** are standalone content entities.
- **Settings** and **Users** manage site-level administration.

## Tables Dictionary

### 1. `course_categories`
Stores the high-level classifications of courses (Graduação, Pós-Graduação, etc.).
- `id`: INT (Primary Key)
- `nome`: VARCHAR(100)
- `slug`: VARCHAR(100) - URL friendly identifier
- `icone`: VARCHAR(50) - FontAwesome icon class
- `ordem`: INT - Display order

### 2. `course_modalities`
Stores the delivery methods (Presencial, EAD, Semipresencial).
- `id`: INT (Primary Key)
- `nome`: VARCHAR(50)
- `slug`: VARCHAR(50)

### 3. `courses`
The central table for all academic offerings.
- `id`: INT (Primary Key)
- `category_id`: INT (FK to `course_categories`)
- `modality_id`: INT (FK to `course_modalities`)
- `nome`: VARCHAR(255)
- `slug`: VARCHAR(255) (Indexed)
- `descricao_curta`: TEXT
- `descricao_completa`: LONGTEXT
- `objetivos`: TEXT
- `perfil_egresso`: TEXT
- `mercado_trabalho`: TEXT
- `duracao_texto`: VARCHAR(100) (e.g., "4 anos")
- `carga_horaria`: INT
- `valor_mensalidade`: DECIMAL(10,2)
- `imagem_destaque`: VARCHAR(255)
- `coordenador`: VARCHAR(100)
- `vagas_disponiveis`: INT
- `status`: ENUM('ativo', 'inativo') (Indexed)
- `destaque`: BOOLEAN (Indexed)
- `ordem`: INT

### 4. `course_curriculum`
Stores the subjects/disciplines for each course by semester.
- `id`: INT (Primary Key)
- `course_id`: INT (FK to `courses`)
- `semestre`: INT
- `disciplina`: VARCHAR(255)
- `carga_horaria`: INT

### 5. `students`
Registered potential or current students.
- `id`: INT (Primary Key)
- `nome`: VARCHAR(255)
- `email`: VARCHAR(255) (Unique)
- `cpf`: VARCHAR(14) (Unique)
- `telefone`: VARCHAR(20)
- `data_nascimento`: DATE

### 6. `enrollments`
Links students to the courses they applied for.
- `id`: INT (Primary Key)
- `student_id`: INT (FK to `students`)
- `course_id`: INT (FK to `courses`)
- `forma_ingresso`: VARCHAR(50)
- `status`: ENUM('pendente', 'aprovado', 'cancelado')
- `data_inscricao`: TIMESTAMP

### 7. `contacts`
Stores messages from the contact form.
- `id`: INT (Primary Key)
- `nome`: VARCHAR(255)
- `email`: VARCHAR(255)
- `telefone`: VARCHAR(20)
- `assunto`: VARCHAR(255)
- `mensagem`: TEXT
- `lido`: BOOLEAN

### 8. `news` (Institutional Content)
- `id`: INT (Primary Key)
- `titulo`: VARCHAR(255)
- `slug`: VARCHAR(255)
- `resumo`: TEXT
- `conteudo`: LONGTEXT
- `imagem_destaque`: VARCHAR(255)
- `data_publicacao`: DATETIME
- `status`: ENUM('rascunho', 'publicado')

### 9. `events`
- `id`: INT (Primary Key)
- `titulo`: VARCHAR(255)
- `slug`: VARCHAR(255)
- `descricao`: TEXT
- `imagem_destaque`: VARCHAR(255)
- `data_inicio`: DATETIME
- `data_fim`: DATETIME
- `local`: VARCHAR(255)
- `status`: ENUM('ativo', 'inativo')

### 10. `settings`
Global site configurations.
- `id`: INT (Primary Key)
- `chave`: VARCHAR(50) (Unique)
- `valor`: TEXT
- `descricao`: VARCHAR(255)

## Optimization Features

### Scalability (100+ Courses)
- **Indexing**: Frequent filter columns (`status`, `destaque`, `slug`, `category_id`) are indexed to ensure sub-millisecond query results even with thousands of records.
- **Full-Text Search**: The `courses` and `news` tables use `FULLTEXT` indexes for efficient keyword searching across large text bodies.
- **Relationship Constraints**: `ON DELETE CASCADE` is implemented for `course_curriculum` to ensure data integrity during maintenance.

### Security
- **Data Types**: Strict data type usage (e.g., `DECIMAL` for currency, `DATE` for births) prevents data corruption.
- **Unique Constraints**: `email` and `cpf` in `students` prevent duplicate registrations.

---

**Version**: 1.0  
**Last Updated**: January 4, 2026
