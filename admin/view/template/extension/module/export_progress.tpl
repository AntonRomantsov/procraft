<div class="progress" style="margin-top: 15px;">
    <div
            id="export-progress"
            class="progress-bar"
            role="progressbar"
            aria-valuenow="<?php !empty($value_now) ? $value_now : 0 ?>"
            aria-valuemin="0"
            aria-valuemax="<?php !empty($value_max) ? $value_max : 0 ?>"
            style="width: <?php !empty($value_percent) ? $value_percent : 0 ?>%;">
        <span class="sr-only"><?php !empty($value_percent) ? $value_percent : 0 ?>% Complete</span>
    </div>
</div>