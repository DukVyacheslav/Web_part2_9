<?php require_once 'header.php'; ?>

<form method="post">
    <div class="form-group">
        <label>Вопрос 1: Какой язык используется для серверной части?</label>
        <input type="text" name="question1" class="form-control">
        <?php if (isset($errors['question1'])): ?>
            <div class="text-danger"><?= implode(', ', $errors['question1']) ?></div>
        <?php endif; ?>
    </div>
    
    <button type="submit" class="btn btn-primary">Проверить</button>
</form>

<?php require_once 'footer.php'; ?>