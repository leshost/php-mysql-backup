<?php
// Налаштування з'єднання з базою даних
$host = 'localhost';
$user = 'root';
$password = 'your_password';
$dbName = 'your_database_name';

// Створення імені файлу резервної копії
$dateTime = date('Y-m-d-H-i-s');
$backupFile = "{$dbName}-backup-{$dateTime}.sql";

// Повний шлях до збереження файлу
$backupPath = __DIR__ . '/backups';
if (!is_dir($backupPath)) {
    mkdir($backupPath, 0755, true);
}
$fullPath = "{$backupPath}/{$backupFile}";

// Формування команди mysqldump
$command = "mysqldump --user={$user} --password={$password} --host={$host} {$dbName} > {$fullPath}";

// Виконання команди
system($command, $result);

// Перевірка результату
if ($result === 0) {
    echo "Резервна копія успішно створена: {$fullPath}\n";
} else {
    echo "Помилка при створенні резервної копії.\n";
}
?>
