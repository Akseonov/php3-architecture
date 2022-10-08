<?php
//вывод всего содержимого папки вверху проекта
foreach (new DirectoryIterator('../') as $fileInfo) {
    if ($fileInfo->isDot()) {
        continue;
    }
    echo $fileInfo->getFilename() . PHP_EOL;
}