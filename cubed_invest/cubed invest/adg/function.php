<?php
	//получить таблицу, упорядочить по полю, выбрать если
	function get_list($table, $where="1 = 1", $order='id') {
		global $mysqli;
		$list = [];
		$sql = "SELECT * FROM `{$table}` ";
		$sql .= " WHERE ".$where." ";
		$sql .= " ORDER BY {$order} ";
		$sql .= " ;";
		$result = $mysqli->query($sql);
		if ($result) {
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}
		}
		return $list;
	}
function get($value) {
    return isset($_GET[$value]) ? $_GET[$value] : "";
}

function post($value) {
    return isset($_POST[$value]) ? $_POST[$value] : "";
}
function session($value) {
    return isset($_SESSION[$value]) ? $_SESSION[$value] : "";
}



    function formatMoney($money) {
        return sprintf("%01.2f", $money);
    }

    function formatNumber($number) {
        return formatMoney($number);
    }

    function formatDate($date) {
    	return date('Y-m-d H:i:s', $date);
    }


	//получить строку 
	function get_row_by_id($table, $id) {
		global $mysqli;
		$list = [];
		$sql = "SELECT * FROM {$table} WHERE id = ".(int)$id." LIMIT 1;";
		$result = $mysqli->query($sql);
		if ($result) {
			return $result->fetch_assoc();
		}
		return [];
	}

	//получить значение
	function get_value_by_id($table, $id, $field) {
		global $mysqli;
		$list = [];
		$sql = "SELECT {$field} FROM {$table} WHERE id = ".(int)$id." LIMIT 1;";
		$result = $mysqli->query($sql);
		if ($result) {
			return $result->fetch_array()[0];
		}
		return [];		
	}

	//получить строку 
	function get_row_by_field($table, $field, $value) {
		global $mysqli;
		$list = [];
		$sql = "SELECT * FROM `{$table}` WHERE `{$field}` = ".escape_db($value)." LIMIT 1;";
		$result = $mysqli->query($sql);
		if ($result) {
			return $result->fetch_assoc();
		}
		return [];
	}

    //получить максимальный id
    function get_max_id($table) {
        global $mysqli;
        $sql = "SELECT MAX(id) as max FROM `{$table}` LIMIT 1;";
        $res = $mysqli->query($sql);
        if ($res) {
            if($row = $res->fetch_assoc()) {
                return (int)$row['max'];
            }
        }
        return 0;
    }



    function escape_db($value) {
        global $mysqli;
        return "'".$mysqli->real_escape_string($value)."'";
    }

	
    function format_money($money) {
        return sprintf("%01.2f", $money);
    }

    function format_number($number) {
        return format_Money($number);
    }

    function format_date($date) {
        return date('Y-m-d H:i:s', $date);
    }



    //это пост запрос
    function is_post() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    //это ajax запрос
    function is_ajax() {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    function redirect($link) {
        header("Location: ".$link, TRUE, 301);
        exit(0);
    }

    function send_json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit(0);
    }

    function throw_json_error($message) {
        send_json([
            'error' => true,
            'message' => $message
        ]);
    }