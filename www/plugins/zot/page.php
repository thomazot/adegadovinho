<?php
if (isset($_POST['colors_primary'])) {
    $value = $_POST['colors_primary'];
    update_option('colors_primary', $value);
}

if (isset($_POST['colors_secundary'])) {
    $value = $_POST['colors_secundary'];
    update_option('colors_secundary', $value);
}

$primary = get_option('colors_primary', THEMENAME);
$secundary = get_option('colors_secundary', THEMENAME);

?>
<h1>Cores</h1>

<form action="" method="POST">
    <div>
        <label for="colors_primary">Cor Primária: </label>
        <input name="colors_primary" id="colors_primary" type="text" value="<?php echo $primary?>" class="my-color-field" data-default-color="#effeff" />
    </div>
    <div>
        <label for="colors_secundary">Cor Secundária: </label>
        <input name="colors_secundary" type="text" value="<?php echo $secundary?>" class="my-color-field" data-default-color="#effeff" />
    </div>

    <input type="submit" value="Atualizar" class="button button-primary button-large">
</form>