<?php
/**
 * FAESMA - Política de Privacidade
 * Required legal information
 */

define('FAESMA_ACCESS', true);

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/includes/Database.php';
require_once __DIR__ . '/includes/functions.php';

$page_title = 'Política de Privacidade';
$meta_description = 'Conheça a política de privacidade e proteção de dados da FAESMA - em conformidade com a LGPD.';

include __DIR__ . '/includes/header.php';
?>

<!-- Page Header -->
<section
    style="background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light)); color: white; padding: 4rem 0; text-align: center;">
    <div class="container">
        <h1 style="color: white; margin-bottom: 1rem;">Termos de Uso</h1>
        <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9);">
            Termos de Uso e Licença
        </p>
    </div>
</section>

<!-- Terms Content -->
<section class="section">
    <div class="container">
        <div style="max-width: 900px; margin: 0 auto; color: var(--color-gray-800); line-height: 1.8;">
            <h3 style="margin-bottom:1.5rem; text-align: justify;">1. Termos</h3>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                Ao acessar ao site FAESMA - Faculdade Alcance de Ensino Superior do Maranhão, concorda em cumprir estes termos de serviço, todas as leis e regulamentos aplicáveis ​​e concorda que é responsável pelo cumprimento de todas as leis locais aplicáveis. Se você não concordar com algum desses termos, está proibido de usar ou acessar este site. Os materiais contidos neste site são protegidos pelas leis de direitos autorais e marcas comerciais aplicáveis.
            </p>
            <h3 style="margin-bottom:1.5rem; text-align: justify;">2. Uso de Licença</h3>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                É concedida permissão para baixar temporariamente uma cópia dos materiais (informações ou software) no site FAESMA - Faculdade Alcance de Ensino Superior do Maranhão , apenas para visualização transitória pessoal e não comercial. Esta é a concessão de uma licença, não uma transferência de título e, sob esta licença, você não pode:                
                 <br>1. modificar ou copiar os materiais; 
                 <br>2. usar os materiais para qualquer finalidade comercial ou para exibição pública (comercial ou não comercial); 
                 <br>3. tentar descompilar ou fazer engenharia reversa de qualquer software contido no site FAESMA - Faculdade Alcance de Ensino Superior do Maranhão; 
                 <br>4. remover quaisquer direitos autorais ou outras notações de propriedade dos materiais; 
                 <br>5. transferir os materiais para outra pessoa ou 'espelhe' os materiais em qualquer outro servidor.
                <br>Esta licença será automaticamente rescindida se você violar alguma dessas restrições e poderá ser rescindida por FAESMA - Faculdade Alcance de Ensino Superior do Maranhão a qualquer momento. Ao encerrar a visualização desses materiais ou após o término desta licença, você deve apagar todos os materiais baixados em sua posse, seja em formato eletrónico ou impresso.
            </p>
            <h3 style="margin-bottom:1.5rem; text-align: justify;">3. Isenção de responsabilidade</h3>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                1. Os materiais no site da FAESMA - Faculdade Alcance de Ensino Superior do Maranhão são fornecidos 'como estão'. FAESMA - Faculdade Alcance de Ensino Superior do Maranhão não oferece garantias, expressas ou implícitas, e, por este meio, isenta e nega todas as outras garantias, incluindo, sem limitação, garantias implícitas ou condições de comercialização, adequação a um fim específico ou não violação de propriedade intelectual ou outra violação de direitos.
                <br>2. Além disso, a FAESMA - Faculdade Alcance de Ensino Superior do Maranhão não garante ou faz qualquer representação relativa à precisão, aos resultados prováveis ​​ou à confiabilidade do uso dos materiais em seu site ou de outra forma relacionado a esses materiais ou em sites vinculados a este site.
            </p>
            <h3 style="margin-bottom:1.5rem; text-align: justify;">4. Limitações</h3>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                Em nenhum caso a FAESMA - Faculdade Alcance de Ensino Superior do Maranhão ou seus fornecedores serão responsáveis ​​por quaisquer danos (incluindo, sem limitação, danos por perda de dados ou lucro ou devido a interrupção dos negócios) decorrentes do uso ou da incapacidade de usar os materiais em FAESMA - Faculdade Alcance de Ensino Superior do Maranhão, mesmo que FAESMA - Faculdade Alcance de Ensino Superior do Maranhão ou um representante autorizado da FAESMA - Faculdade Alcance de Ensino Superior do Maranhão tenha sido notificado oralmente ou por escrito da possibilidade de tais danos. Como algumas jurisdições não permitem limitações em garantias implícitas, ou limitações de responsabilidade por danos conseqüentes ou incidentais, essas limitações podem não se aplicar a você.
            </p>
            <h3 style="margin-bottom:1.5rem; text-align: justify;">5. Precisão dos materiais</h3>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                Os materiais exibidos no site da FAESMA - Faculdade Alcance de Ensino Superior do Maranhão podem incluir erros técnicos, tipográficos ou fotográficos. FAESMA - Faculdade Alcance de Ensino Superior do Maranhão não garante que qualquer material em seu site seja preciso, completo ou atual. FAESMA - Faculdade Alcance de Ensino Superior do Maranhão pode fazer alterações nos materiais contidos em seu site a qualquer momento, sem aviso prévio. No entanto, FAESMA - Faculdade Alcance de Ensino Superior do Maranhão não se compromete a atualizar os materiais.
            </p>
            <h3 style="margin-bottom:1.5rem; text-align: justify;">6. Links</h3>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                A FAESMA - Faculdade Alcance de Ensino Superior do Maranhão não analisou todos os sites vinculados ao seu site e não é responsável pelo conteúdo de nenhum site vinculado. A inclusão de qualquer link não implica endosso por FAESMA - Faculdade Alcance de Ensino Superior do Maranhão do site. O uso de qualquer site vinculado é por conta e risco do usuário.
            </p>
            <h4 style="margin-bottom:1.5rem; text-align: justify;">Modificações</h4>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                A FAESMA - Faculdade Alcance de Ensino Superior do Maranhão pode revisar estes termos de serviço do site a qualquer momento, sem aviso prévio. Ao usar este site, você concorda em ficar vinculado à versão atual desses termos de serviço.
            </p>
            <h4 style="margin-bottom:1.5rem; text-align: justify;">Lei aplicável</h4>
            <p style="margin-bottom: 1.5rem; text-align: justify;">
                Estes termos e condições são regidos e interpretados de acordo com as leis da FAESMA - Faculdade Alcance de Ensino Superior do Maranhão e você se submete irrevogavelmente à jurisdição exclusiva dos tribunais naquele estado ou localidade.
            </p>

           </div>
    </div>
</section>

<?php
include __DIR__ . '/includes/footer.php';
?>