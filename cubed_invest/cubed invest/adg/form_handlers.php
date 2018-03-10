<?php

    function form_create($table, $fields) {
        global $mysqli;
        $report = "";
        if (isPost() && isset($_POST['create'])) {
            $sql = "INSERT INTO `{$table}` SET ";
            $index = 0;
            foreach ($fields as $name=>$type) {
                if (false && $type !== "file" && (!isset($_POST[$name]) || empty(post($name)))) {
                    $report = 'Одно или несколько полей пусты!';
                    break;
                } else {
                    $value = post($name);
                    if ($type === "string") {
                        $value = (string)$value;
                    } elseif ($type === "int") {
                        $value = (int)$value;
                    } elseif ($type === "bool") {
                        $value = (bool)$value;
                    } elseif ($type === "float") {
                        $value = (float)$value;
                    } elseif ($type === "file") {
                        if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name'])) {
                            // Check MIME Type by yourself.
                            $ext = substr(strrchr($_FILES[$name]['name'], '.'), 1);
                            if (!move_uploaded_file(
                                $_FILES[$name]['tmp_name'],
                                sprintf(__DIR__.'/../downloads/%s.%s',
                                    md5($_FILES[$name]['tmp_name']),
                                    $ext
                                )
                            )) {
                                $report = "Неудается переместить файл в каталог загрузки! Проверте права на каталог downloads(777)!";
                            } else {
                                $value = sprintf('downloads/%s.%s',
                                    md5($_FILES[$name]['tmp_name']),
                                    $ext
                                );
                            }
                        }
                    } else {
                        $value = (string)$value;
                    }
                    $sql .= " `{$name}` = ".dbEscape($value);
                }
                if ($index === count($fields) - 1) {
                    $sql .= "; ";
                } else {
                    $sql .= ", ";
                }
                $index += 1;
            }
            if (empty($report)) {
                if ($mysqli->query($sql)) {
                    $report = 'Объект успешно создан!'; 
                    unset($_POST);
                } else {
                    $report = 'Ошбика создания объекта!';
                }
            }
        }
        return $report;
    }

    function form_delete($table) {
        $report = "";
        global $mysqli;
        if(isPost() && isset($_POST['delete'], $_POST['id'])) {
            $result_delete = $mysqli->query("DELETE FROM `{$table}` WHERE id = ".dbEscape(post("id"))." LIMIT 1;");
            if($result_delete) {
                $report = "Объект удален!";
            } else {
                $report = "Ошибка";
            }
        }
        return $report;
    }


    //в стадии тестирования
    function form_update($table, $fields=[], $id="id") {
        global $mysqli;
        $report = "";
        if (isPost() && isset($_POST['update'])) {
            $sql = "UPDATE `{$table}` SET {$id} = ".(int)post($id);
            foreach ($fields as $name=>$type) {
                if (false && $type !== "file" && $type !== "bool" && (!isset($_POST[$name]) /*|| empty(post($name))*/)) {
                    $report = 'Одно или несколько полей пусты!';
                    break;
                } else {
                    $value = post($name);
                    if ($type === "string") {
                        $value = (string)$value;
                    } elseif ($type === "int") {
                        $value = (int)$value;
                    } elseif ($type === "float") {
                        $value = (float)$value;
                    } elseif ($type === "bool") {
                        $value = (bool)$value;
                    } elseif ($type === "file") {
                        if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name'])) {
                            // Check MIME Type by yourself.
                            $ext = substr(strrchr($_FILES[$name]['name'], '.'), 1);
                            if (!move_uploaded_file(
                                $_FILES[$name]['tmp_name'],
                                sprintf(__DIR__.'/../downloads/%s.%s',
                                    md5($_FILES[$name]['tmp_name']),
                                    $ext
                                )
                            )) {
                                $report = "Неудается переместить файл в каталог загрузки! Проверте права на каталог downloads(777)!";
                            } else {
                                $value = sprintf('downloads/%s.%s',
                                    md5($_FILES[$name]['tmp_name']),
                                    $ext
                                );
                            }
                        }
                    } else {
                        $value = (string)$value;
                    }
                    $sql .= ", `{$name}` = ".dbEscape($value);
                }
            }
            $sql .= " WHERE {$id} = ".(int)post($id)." LIMIT 1; ";
            if (empty($report)) {
                if ($mysqli->query($sql)) {
                    $report = 'Объект успешно обновлен!';
                } else {
                    $report = 'Ошбика обновления объекта!';
                }
            }
        } else {
            if (!isset($_POST[$id])) {
                $_POST[$id] = get($id);
            }
            $row = get_row_by_id($table, (int)post($id));
            foreach($fields as $name=>$type) {
                $value = $row[$name];
                if ($type === "string") {
                    $value = (string)$value;
                } elseif ($type === "int") {
                    $value = (int)$value;
                } elseif ($type === "bool") {
                    $value = (bool)$value;
                } elseif ($type === "float") {
                    $value = (float)$value;
                } else {
                    $value = (string)$value;
                }
                $_POST[$name] = $value;
            }
        }
        return $report;
    }


    //в стадии тестирования
    function form_update_fields($table, $fields=[], $id="id") {
        global $mysqli;
        $report = "";
        if (isPost() && isset($_POST['update_field'])) {
            $sql = "UPDATE `{$table}` SET {$id} = ".(int)post($id);
            foreach ($fields as $name=>$type) {
                if (false && $type !== "file" /*&& (!isset($_POST[$name]) || empty(post($name)))*/) {
                    $report = 'Поле пустое!';
                    break;
                } else {
                    $value = post($name);

                    if ($type === "string") {
                        $value = (string)$value;
                    } elseif ($type === "int") {
                        $value = (int)$value;
                    } elseif ($type === "bool") {
                        $value = (bool)$value;
                    } elseif ($type === "float") {
                        $value = (float)$value;
                    } elseif ($type === "file") {
                        if (isset($_FILES[$name]['tmp_name']) && !empty($_FILES[$name]['tmp_name'])) {
                            // Check MIME Type by yourself.
                            $ext = substr(strrchr($_FILES[$name]['name'], '.'), 1);
                            if (!move_uploaded_file(
                                $_FILES[$name]['tmp_name'],
                                sprintf(__DIR__.'/../downloads/%s.%s',
                                    md5($_FILES[$name]['tmp_name']),
                                    $ext
                                )
                            )) {
                                $report = "Неудается переместить файл в каталог загрузки! Проверте права на каталог downloads(777)!";
                            } else {
                                $value = sprintf('downloads/%s.%s',
                                    md5($_FILES[$name]['tmp_name']),
                                    $ext
                                );
                            }
                        } else {
                            $report = "Что то пошло не так, файл не загружен!";
                        }
                    } else {
                        $value = (string)$value;
                    }
                    if (isset($_POST[$name]) || $type === "file") {
                        $sql .= ", `{$name}` = ".dbEscape($value);
                        break;
                    }
                    if ($type === "bool" && post('field') === $name) {
                        $sql .= ", `{$name}` = ".dbEscape($value);
                        break;           
                    }
                }
            }
            $sql .= " WHERE {$id} = ".(int)post($id)." LIMIT 1; ";
            if (empty($report)) {
                if ($mysqli->query($sql)) {
                    $report = 'Объект успешно обновлен!';
                } else {
                    $report = 'Ошбика обновления объекта!';
                }
            }
        } else {
            if (!isset($_POST[$id])) {
                $_POST[$id] = get($id);
            }
            $row = get_row_by_id($table, (int)post($id));
            foreach($fields as $name=>$type) {
                $value = $row[$name];
                if ($type === "string") {
                    $value = (string)$value;
                } elseif ($type === "int") {
                    $value = (int)$value;
                } elseif ($type === "bool") {
                    $value = (bool)$value;
                } elseif ($type === "float") {
                    $value = (float)$value;
                } else {
                    $value = (string)$value;
                }
                $_POST[$name] = $value;
            }
        }
        return $report;
    }