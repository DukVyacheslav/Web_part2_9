<!DOCTYPE html>
<html>
<body>
    <h1>Фотоальбом</h1>
    <table border="1">
        <?php foreach ($photos as $photo): ?>
            <tr>
                <td>
                    <img src="/public/images/<?= $photo['file'] ?>" width="200">
                </td>
                <td><?= $photo['caption'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>