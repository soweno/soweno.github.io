<?php 
    function input($name, $title, $type="text", $placeholder="", $class="form-control", $style="width: 400px;") {
        if ($placeholder === "") {
            $placeholder = $title;
        }
        ?>
            <input class="<?php echo $class; ?>" style="<?php echo $style; ?>" type="<?php echo $type; ?>" name="<?php echo $name; ?>" placeholder="<?php echo $placeholder; ?>" title="<?php echo $title; ?>" value="<?php echo $type === "checkbox" ? 1 : post($name); ?>" <?php if ($type === "checkbox" && post($name)) { echo "checked"; } ?> >
        <?php
    }

    function button_delete($id, $name="delete") {
    ?>
            <form action="" method="post">
                <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
                <button type="submit" name="<?php echo $name; ?>" class="btn btn-default" onclick='return window.confirm("Вы действительно хотите удалить объект?");'>Удалить</button>
            </form>
    <?php
    }

    function button_create($name="create") {
        ?>
        <button type="submit" name="<?php echo $name; ?>" class="btn btn-default">Создать</button>
    <?php
    }

    function button_update($name="update") {
        ?>
        <button type="submit" name="<?php echo $name; ?>" class="btn btn-default">Обновить</button>
    <?php
    }

    function button_edit($table, $id, $prefix="update_") {
    ?>
            <form action="?page=<?php echo $prefix.$table; ?>" method="post">
                <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
                <button type="submit" class="btn btn-default">Изменить</button>
            </form>
    <?php
    }

    //field ["name"=>"123", "type"=>"123", "title"=>"123", "placeholder"=>"123", "value"=>"123"]
    function button_update_fields($table, $id, $field=[], $name="update_field") {
    ?>

            <form enctype="multipart/form-data" action="" method="post">
                <input type = "hidden" name = "id" value = "<?php echo $id; ?>">
                <?php if (!isset($field['type']) || $field["type"] === "int" || $field["type"] === "float" || $field["type"] === "string" || $field["type"] === "") { 
                    ?>
                    <input class="form-control" style="width: 100px; float: left; margin-right: 10px;" type="text" name="<?php echo $field['name']; ?>" placeholder="<?php echo isset($field['placeholder']) ? $field['placeholder'] : V($field['title']); ?>" title="<?php echo V($field['title']); ?>" value="<?php echo V($field['value']) ?>" >
                <?php
                    } elseif ($field['type'] === "bool") {
                ?>
                    <input class="form-control" style="width: 100px; float: left; margin-right: 10px;" type='checkbox' name="<?php echo $field['name']; ?>" placeholder="<?php echo isset($field['placeholder']) ? $field['placeholder'] : V($field['title']); ?>" title="<?php echo V($field['title']); ?>" value="1" <?php if ($field['type'] === "bool" && V($field['value'])) { echo "checked"; } ?>>
                    <input type = "hidden" name = "field" value = "<?php echo $field['name']; ?>">
                <?php
                    } elseif ($field['type'] === "file") {
                        //file
                        input($field['name'], "", "file", "", "");
                    }
                ?>
                <?php button_update("update_field"); ?>
            </form>
    <?php
    }


    //строка для страницы настроек
    function input_page_settings($table, $id, $name, $title, $value="", $type="") { ?>
        <tr>
            <td>
                <?php echo $title; ?>
            </td>
            <td>
                <?php 
                button_update_fields($table, $id, 
                    ["name"=>$name, "value"=>$value, "title"=>$title, "type"=>$type]);
                ?>
            </td>
        </tr>
    <?php
    }


    function input_options($table, $name, $value="", $fields=["id"=>"id", "name"=>"name"], $where="1 = 1", $order='id') { ?>
            <select name="<?php echo $name; ?>" class="form-control" style="width: 100px; float: left; margin-right: 10px;">
                <?php foreach (get_list($table, $where, $order) as $row) { ?>
                    <option value="<?php echo escape($row[$fields['id']]); ?>" <?php if ($value == $row[$fields['id']]) { echo "selected"; } ?> ><?php echo escape($row[$fields['name']]); ?></option>
            <?php } ?>
            </select>
    <?php
    }