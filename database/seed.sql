-- ============================================
-- FAESMA - Seed Data
-- Sample data for testing and initial setup
-- ============================================

USE faesma_db;

-- ============================================
-- SEED: course_categories
-- ============================================
INSERT INTO course_categories (nome, slug, descricao, ordem) VALUES
('Graduação', 'graduacao', 'Cursos de bacharelado e licenciatura', 1),
('Pós-graduação', 'pos-graduacao', 'Cursos de especialização e MBA', 2),
('Tecnólogo', 'tecnologo', 'Cursos superiores de tecnologia', 3);

-- ============================================
-- SEED: course_modalities
-- ============================================
INSERT INTO course_modalities (nome, slug, descricao) VALUES
('Presencial', 'presencial', 'Aulas presenciais no campus'),
('EAD', 'ead', 'Ensino a distância 100% online'),
('Híbrido', 'hibrido', 'Combinação de aulas presenciais e online');

-- ============================================
-- SEED: courses
-- Sample courses in different categories
-- ============================================
INSERT INTO courses (category_id, modality_id, nome, slug, descricao_curta, descricao_completa, objetivos, perfil_egresso, mercado_trabalho, duracao_meses, duracao_texto, carga_horaria, coordenador, valor_mensalidade, vagas_disponiveis, status, destaque, ordem) VALUES

-- Graduação - Presencial
(1, 1, 'Direito', 'direito', 
'Forme-se em Direito e contribua para uma sociedade mais justa.', 
'O curso de Direito da FAESMA prepara profissionais éticos e competentes para atuar nas diversas áreas jurídicas. Com corpo docente qualificado e infraestrutura moderna, oferecemos formação sólida em teoria e prática do Direito.', 
'Formar bacharéis em Direito com visão crítica, ética e humanística, aptos a compreender e aplicar o ordenamento jurídico na defesa dos direitos e da justiça social.', 
'Profissional capacitado para atuar como advogado, juiz, promotor, defensor público, delegado, consultor jurídico, entre outras carreiras jurídicas.', 
'Escritórios de advocacia, departamentos jurídicos de empresas, órgãos públicos, magistratura, ministério público, defensoria pública, delegacias, consultorias.', 
60, '5 anos', 4000, 'Dr. Carlos Alberto Santos', 950.00, 100, 'ativo', TRUE, 1),

(1, 1, 'Administração', 'administracao', 
'Desenvolva habilidades gerenciais e empreendedoras.', 
'O curso de Administração forma profissionais capazes de planejar, organizar e gerenciar organizações públicas e privadas. Com foco em gestão estratégica, empreendedorismo e inovação.', 
'Formar administradores com competências técnicas e comportamentais para gestão eficaz de organizações, com visão sistêmica e empreendedora.', 
'Gestor preparado para atuar em diversas áreas da administração: financeira, marketing, recursos humanos, produção e logística.', 
'Empresas de todos os portes e segmentos, consultorias, instituições financeiras, ONGs, órgãos públicos, negócios próprios.', 
48, '4 anos', 3200, 'Prof. Maria Helena Costa', 850.00, 80, 'ativo', TRUE, 2),

(1, 2, 'Pedagogia', 'pedagogia', 
'Forme educadores comprometidos com a transformação social.', 
'O curso de Pedagogia da FAESMA forma professores e gestores educacionais preparados para atuar na educação infantil, ensino fundamental e gestão escolar, com metodologias inovadoras.', 
'Formar pedagogos aptos para atuar na docência, gestão educacional e coordenação pedagógica, com domínio de teorias e práticas educacionais.', 
'Educador capacitado para lecionar na educação infantil e anos iniciais do ensino fundamental, além de atuar na gestão e coordenação pedagógica.', 
'Escolas públicas e privadas, centros de educação infantil, instituições de ensino, secretarias de educação, editoras, empresas de treinamento.', 
48, '4 anos', 3200, 'Profa. Ana Paula Oliveira', 750.00, 60, 'ativo', FALSE, 3),

(1, 1, 'Enfermagem', 'enfermagem', 
'Cuide de vidas com excelência e humanização.', 
'O curso de Enfermagem prepara profissionais para atuarem no cuidado integral à saúde, com sólida formação técnica, científica e humanística. Laboratórios modernos e parcerias com hospitais.', 
'Formar enfermeiros competentes para prestar assistência integral de enfermagem, promover saúde e prevenir doenças em todas as fases da vida.', 
'Profissional de saúde apto para atuar em hospitais, clínicas, unidades de saúde, home care e gestão de serviços de enfermagem.', 
'Hospitais, clínicas, UPAs, unidades básicas de saúde, home care, empresas, planos de saúde, vigilância sanitária.', 
60, '5 anos', 4000, 'Profa. Dra. Juliana Ferreira', 1200.00, 50, 'ativo', TRUE, 4),

(1, 1, 'Engenharia Civil', 'engenharia-civil', 
'Construa o futuro com conhecimento e tecnologia.', 
'O curso de Engenharia Civil forma profissionais capacitados para projetar, executar e gerenciar obras de infraestrutura. Laboratórios equipados e corpo docente especializado.', 
'Formar engenheiros civis com competências para projetar, construir e gerenciar obras e infraestruturas, aplicando conhecimentos de matemática, física e tecnologia.', 
'Engenheiro apto para atuar em projetos estruturais, geotécnicos, hidráulicos, construção civil e gestão de obras.', 
'Construtoras, empresas de projetos, órgãos públicos, consultorias, fiscalização de obras, empreendimentos próprios.', 
60, '5 anos', 3600, 'Eng. Roberto Carlos Lima', 1350.00, 40, 'ativo', FALSE, 5),

-- Tecnólogo - Híbrido
(3, 3, 'Gestão de Recursos Humanos', 'gestao-recursos-humanos', 
'Gerencie pessoas e desenvolva talentos.', 
'O curso forma profissionais especializados em gestão de pessoas, recrutamento, treinamento e desenvolvimento organizacional. Formato híbrido para maior flexibilidade.', 
'Formar tecnólogos especializados em gestão de pessoas, capazes de recrutar, desenvolver e reter talentos nas organizações.', 
'Especialista em RH preparado para atuar em recrutamento, seleção, treinamento, desenvolvimento, departamento pessoal e gestão de benefícios.', 
'Departamentos de RH de empresas, consultorias de RH, agências de recrutamento, empresas de treinamento corporativo.', 
24, '2 anos', 1600, 'Prof. João Pedro Alves', 650.00, 60, 'ativo', FALSE, 6),

(3, 2, 'Análise e Desenvolvimento de Sistemas', 'analise-desenvolvimento-sistemas', 
'Desenvolva soluções tecnológicas inovadoras.', 
'Curso focado em programação, análise de sistemas e desenvolvimento de software. Prepare-se para o mercado de TI com as tecnologias mais atuais. Modalidade 100% EAD.', 
'Formar tecnólogos capacitados para analisar, projetar, desenvolver e implementar sistemas de informação.', 
'Desenvolvedor de software apto para criar aplicações web, mobile e desktop, trabalhar com banco de dados e gerenciar projetos de TI.', 
'Empresas de tecnologia, startups, departamentos de TI, consultorias, agências digitais, desenvolvimento freelancer.', 
30, '2,5 anos', 2000, 'Prof. Marcos Vinícius Tech', 580.00, 100, 'ativo', TRUE, 7),

-- Pós-graduação
(2, 3, 'MBA em Gestão Empresarial', 'mba-gestao-empresarial', 
'Especialize-se em gestão estratégica de negócios.', 
'MBA focado em desenvolver competências gerenciais avançadas. Para profissionais que buscam posições de liderança. Formato híbrido com aulas aos finais de semana.', 
'Capacitar profissionais para gestão estratégica de organizações, tomada de decisões e liderança de equipes.', 'Gestor estratégico preparado para assumir posições de liderança em empresas de diversos segmentos.', 
'Cargos de gerência e diretoria em empresas, consultorias, empreendimentos próprios.', 
18, '18 meses', 420, 'Prof. Dr. Fernando Augusto', 450.00, 40, 'ativo', FALSE, 8),

(2, 2, 'Especialização em Direito do Trabalho', 'especializacao-direito-trabalho', 
'Aprofunde-se nas relações trabalhistas.', 
'Pós-graduação para advogados que desejam especializar-se em Direito do Trabalho. Corpo docente composto por magistrados e advogados atuantes. 100% EAD.', 
'Especializar profissionais do Direito nas questões trabalhistas, previdenciárias e processuais do trabalho.', 
'Advogado especialista em Direito do Trabalho, preparado para atuar em processos trabalhistas e consultoria.', 
'Escritórios de advocacia trabalhista, departamentos jurídicos, sindicatos, magistratura do trabalho.', 
12, '12 meses', 360, 'Dr. Antonio Carlos Ribeiro', 380.00, 35, 'ativo', FALSE, 9);

-- ============================================
-- SEED: course_curriculum
-- Sample curriculum for one course (Direito)
-- ============================================
INSERT INTO course_curriculum (course_id, semestre, disciplina, carga_horaria, ordem) VALUES
(1, 1, 'Introdução ao Direito', 80, 1),
(1, 1, 'Teoria Geral do Estado', 80, 2),
(1, 1, 'Ciência Política', 80, 3),
(1, 1, 'Sociologia Jurídica', 80, 4),
(1, 2, 'Direito Civil I', 80, 5),
(1, 2, 'Direito Penal I', 80, 6),
(1, 2, 'Direito Constitucional I', 80, 7),
(1, 3, 'Direito Civil II', 80, 8),
(1, 3, 'Direito Penal II', 80, 9),
(1, 3, 'Direito Empresarial I', 80, 10);

-- ============================================
-- SEED: pages
-- ============================================
INSERT INTO pages (titulo, slug, conteudo, status) VALUES
('Sobre a FAESMA', 
 'sobre', 
 '<h2>História</h2><p>A FAESMA - Faculdade Alcance de Ensino Superior do Maranhão foi fundada com o objetivo de democratizar o acesso ao ensino superior de qualidade no Maranhão.</p><h2>Missão</h2><p>Nossa missão é formar profissionais competentes, éticos e comprometidos com o desenvolvimento social.</p><h2>Visão</h2><p>Ser reconhecida como referência em ensino superior no Maranhão.</p>',
 'publicado'),

('Política de Privacidade', 
 'privacidade', 
 '<h2>Política de Privacidade</h2><p>A FAESMA respeita a privacidade de seus visitantes e alunos...</p>',
 'publicado');

-- ============================================
-- SEED: settings
-- ============================================
INSERT INTO settings (setting_key, setting_value, setting_type, description) VALUES
('site_name', 'FAESMA - Faculdade Alcance de Ensino Superior do Maranhão', 'text', 'Nome do site'),
('site_email', 'contato@faesma.com.br', 'email', 'E-mail principal'),
('site_phone', '(98) 98848-7847', 'text', 'Telefone principal'),
('site_address', 'Rua Fé em Deus, 150, 65055-190 - Jardim São Cristóvão, São Luís - MA', 'text', 'Endereço'),
('facebook_url', 'https://facebook.com/faesma', 'url', 'URL do Facebook'),
('instagram_url', 'https://www.instagram.com/faculdadefaesma', 'url', 'URL do Instagram');

-- ============================================
-- SEED: users (default admin)
-- Password: admin123 (hash generated with password_hash())
-- ============================================
INSERT INTO users (username, email, password_hash, nome_completo, role, status) VALUES
('admin', 
 'admin@faesma.edu.br', 
 '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
 'Administrador do Sistema', 
 'admin', 
 'ativo');

-- ============================================
-- End of Seed Data
-- ============================================
