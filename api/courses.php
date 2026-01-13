<?php
/**
 * FAESMA - Courses API
 * RESTful endpoint for ERP integration (Sample)
 */

header('Content-Type: application/json; charset=utf-8');

define('FAESMA_ACCESS', true);

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../includes/Database.php';
require_once __DIR__ . '/../includes/functions.php';

// Simple API Key validation (Demo purposes)
$apiKey = $_SERVER['HTTP_X_API_KEY'] ?? '';
$validApiKey = 'FAESMA_ERP_KEY_2026'; // Should be in DB or ENV --

/* 
// Security check for production
if ($apiKey !== $validApiKey) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized access']);
    exit;
}
*/

$method = $_SERVER['REQUEST_METHOD'];
$db = Database::getInstance();

switch ($method) {
    case 'GET':
        // Retrieve courses
        $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

        if ($id) {
            $course = $db->fetchOne("SELECT c.*, cat.nome as categoria_nome FROM courses c JOIN course_categories cat ON c.category_id = cat.id WHERE c.id = ?", [$id]);
            if ($course) {
                echo json_encode($course);
            } else {
                http_response_code(404);
                echo json_encode(['error' => 'Course not found']);
            }
        } else {
            $courses = $db->fetchAll("SELECT c.*, cat.nome as categoria_nome FROM courses c JOIN course_categories cat ON c.category_id = cat.id ORDER BY c.nome ASC");
            echo json_encode($courses);
        }
        break;

    case 'POST':
        // ERP pushing a new course
        $data = json_decode(file_get_contents('php://input'), true);

        if (!empty($data['nome']) && !empty($data['category_id'])) {
            $sql = "INSERT INTO courses (category_id, modality_id, nome, slug, descricao_curta, status) VALUES (?, ?, ?, ?, ?, ?)";
            $slug = generateSlug($data['nome']);
            $db->query($sql, [
                $data['category_id'],
                $data['modality_id'] ?? 1,
                $data['nome'],
                $slug,
                $data['descricao_curta'] ?? '',
                $data['status'] ?? 'ativo'
            ]);

            echo json_encode(['success' => true, 'id' => $db->lastInsertId()]);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Missing required fields']);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Method not allowed']);
        break;
}
