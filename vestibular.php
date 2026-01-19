<?php
/**
 * FAESMA - Vestibular Page
 */

define('FAESMA_ACCESS', true);

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/Database.php';
require_once __DIR__ . '/includes/functions.php';

$page_title = 'Vestibular e Inscrições';
$meta_description = 'Processo seletivo da FAESMA. Inscreva-se e realize seu sonho de cursar ensino superior.';

// Get pre-selected course if any
$selected_course = null;
if (isset($_GET['curso'])) {
    $selected_course = getCourse(sanitize($_GET['curso']), 'slug');
}

include __DIR__ . '/includes/header.php';
?>

<!-- Page Header -->
<section
    style="background: linear-gradient(135deg, var(--color-secondary), var(--color-secondary-light)); color: white; padding: 5rem 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 1rem; font-size: clamp(2rem, 5vw, 3.5rem);">Processo Seletivo</h1>
        <p style="font-size: 1.3rem; color: rgba(255,255,255,0.95); margin-bottom: 2rem;">
            Realize seu sonho de cursar ensino superior na FAESMA
        </p>
        <a href="https://app.faesma.com.br/captacao/public/selecao-curso" class="btn btn-primary btn-large">
            <i class="fas fa-pen"></i> Inscreva-se Agora
        </a>
    </div>
</section>

<!-- How it Works -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 3rem;">
            <h2 style="color: var(--color-primary);">Como Funciona</h2>
            <h4 style="color: var(--color-secondary); font-size: 1.1rem;">Processo de inscrição nos cursos de Graduação</h4>
        </div>

        <div class="grid grid-4">
            <div style="text-align: center;">
                <div
                    style="width: 80px; height: 80px; margin: 0 auto 1rem; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700; color: white;">
                    1
                </div>
                <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;">Inscrição Online</h4>
                <p style="color: var(--color-secondary); font-size: 0.9rem;">Preencha o formulário de inscrição com seus
                    dados</p>
            </div>

            <div style="text-align: center;">
                <div
                    style="width: 80px; height: 80px; margin: 0 auto 1rem; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700; color: white;">
                    2
                </div>
                <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;">Seletivo</h4>
                <p style="color: var(--color-secondary); font-size: 0.9rem;">Participe do nosso processo seletivo online</p>
            </div>

            <div style="text-align: center;">
                <div
                    style="width: 80px; height: 80px; margin: 0 auto 1rem; background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 700; color: white;">
                    3
                </div>
                <h4 style="color: var(--color-primary); margin-bottom: 0.5rem;">Resultado</h4>
                <p style="color: var(--color-secondary); font-size: 0.9rem;">Após feito o processo seletivo, aguardade a data de resultado onde entraremos em contato informando o resultado</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits -->
<section class="section"
    style="background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); color: white;">
    <div class="container">
        <h2 style="color: white; text-align: center; margin-bottom: 3rem;">Por que Escolher a FAESMA?</h2>

        <div class="grid grid-3">
            <div style="text-align: center;">
                <i class="fas fa-award" style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-accent);"></i>
                <h4 style="color: white; margin-bottom: 0.5rem;">Qualidade Reconhecida</h4>
                <p style="color: rgba(255,255,255,0.9); font-size: 0.95rem;">Cursos autorizados pelo MEC
                </p>
            </div>

            <div style="text-align: center;">
                <i class="fas fa-chalkboard-teacher"
                    style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-accent);"></i>
                <h4 style="color: white; margin-bottom: 0.5rem;">Os melhores conteúdos</h4>
                <p style="color: rgba(255,255,255,0.9); font-size: 0.95rem;">Conteúdos fornecidos pela Plataforma A+, a melhor plataforma de conteúdo EAD</p>
            </div>

            <div style="text-align: center;">
                <i class="fas fa-hand-holding-usd"
                    style="font-size: 3rem; margin-bottom: 1rem; color: var(--color-accent);"></i>
                <h4 style="color: white; margin-bottom: 0.5rem;">Estude no tempo que puder</h4>
                <p style="color: rgba(255,255,255,0.9); font-size: 0.95rem;">Os melhores conteúdos disponíveis em nossa plataforma para você estudar quando quiser
                </p>
            </div>
        </div>
    </div>
</section>

<?php
include __DIR__ . '/includes/footer.php';
?>