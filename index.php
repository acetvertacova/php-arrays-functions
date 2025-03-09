<?php
// Задаем путь к папке с изображениями
$dir = 'image/';
// Сканируем содержимое директории
// scandir — Получает список файлов и каталогов, расположенных по  указанному пути.
// Возвращает array, содержащий имена файлов и каталогов, расположенных по  пути, переданному в параметре
$files = scandir($dir);

// Если нет ошибок при сканировании
if ($files === false) {
    return;
}
?>

<h1 style="font-size: 30px; color:rgb(39, 57, 96); padding: 20px">About dogs</h1>

<div style="display: grid; grid-template-columns: 250px 250px 250px; gap: 10px;">
    <?php
    for ($i = 0; $i < count($files); $i++) {
        // Пропускаем текущий каталог и родительский
        if (($files[$i] != ".") && ($files[$i] != "..")) {
            // Получаем путь к изображению
            $path = $dir . $files[$i]; ?>

        <img style="width: 250px; height: 260px;" src="<?php echo $path; ?>" />
    <?php
        }
    }

    ?>
</div>
<p style="color:rgb(39, 57, 96);">USM &copy; 2025</p>