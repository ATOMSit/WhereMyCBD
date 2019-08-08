<?php if ($showLabel && $options['label'] !== false && $options['label_show']): ?>
    <label class="col-xl-2 col-lg-2 col-form-label">
        <?= Form::customLabel($name, $options['label'], $options['label_attr']) ?>
    </label>
<?php endif; ?>
<?php if ($showField): ?>
    <div class="col-lg-4 col-xl-4">
        <?= Form::input($type, $name, $options['value'], $options['attr']) ?>
    </div>
<?php endif; ?>
<span class="form-text text-muted">
    <?= $options['description'] ?>
</span>