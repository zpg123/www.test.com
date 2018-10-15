<?php

!defined('IN_MYMPS') && exit('FORBIDDEN');
function get_member_cat($cat_arr = '', $ifnone = true)
{
	$option .= ($ifnone == false ? '<select id="catid" datatype="limit" require="true" msg="芜湖" class=input name=catid>' : '<select id="catid" datatype="limit" require="true" msg="请选择所属分类" class=input name="catid[]">');
	$option .= ($ifnone == false ? '<option value="">>不限分类</option>' : '<option value="">请选择所属分类</option>');
	$option .= cat_list('corp', '', $cat_arr, true);
	$option .= '</select>';
	return $option;
}

function get_catparents()
{
	global $db;
	global $db_mymps;
	$data = read_static_cache('catparents');

	if ($data === false) {
		$query = $db->query('SELECT * FROM `' . $db_mymps . 'category` WHERE if_view = \'2\' AND parentid = \'0\' ORDER BY catorder DESC');

		while ($row = $db->fetchRow($query)) {
			$res[$row['catid']]['catid'] = $row['catid'];
			$res[$row['catid']]['catname'] = $row['catname'];
			$res[$row['catid']]['uri'] = Rewrite('category', array('catid' => $row['catid'], 'dir_typename' => $row['dir_typename']));
			$res[$row['catid']]['uri_corp'] = Rewrite('corp', array('catid' => $row['catid']));
		}

		write_static_cache('catparents', $res);
	}
	else {
		$res = $data;
	}

	return $res;
}

function get_area_children($areaid, $pre = 'a.areaid')
{
	return create_in(array_unique(array_merge(array($areaid), array_keys(cat_list('area', $areaid, 0, false)))), $pre);
}

function get_children($catid, $pre = 'a.catid')
{
	return create_in(array_unique(array_merge(array($catid), array_keys(cat_list('category', $catid, 0, false)))), $pre);
}

function get_cat_children($catid, $type = 'category')
{
	if ($row = $GLOBALS['db']->getAll('SELECT catid FROM `' . $GLOBALS['db_mymps'] . $type . '` WHERE parentid = \'' . $catid . '\'')) {
		$cat = array();

		foreach ($row as $k => $v ) {
			$cat[$v['catid']] = $v['catid'];
		}

		$cats = implode(',', $cat) . ',' . $catid;
		return $cats;
	}
	else {
		return $catid;
	}
}

function get_corp_children($corpid)
{
	if ($row = $GLOBALS['db']->getAll('SELECT corpid FROM `' . $GLOBALS['db_mymps'] . 'corp` WHERE parentid = \'' . $corpid . '\'')) {
		$cat = array();

		foreach ($row as $k => $v ) {
			$cat[$v['corpid']] = $v['corpid'];
		}

		$cats = implode(',', $cat) . ',' . $corpid;
		return $cats;
	}
	else {
		return $corpid;
	}
}

function get_categories_foreach($catid = 0, $type = 'category', $ifview = '2')
{
	$bif_view = (($ifview == '2') || ($ifview == '1') ? ' AND b.if_view = \'' . $ifview . '\'' : '');
	$child = mymps_count($type, 'WHERE parentid = \'' . $catid . '\'');
	if (!$child || ($child == 0)) {
		$row = $GLOBALS['db']->getRow('SELECT parentid FROM `' . $GLOBALS['db_mymps'] . $type . '` WHERE catid = \'' . $catid . '\'');
		$sql = 'SELECT catid, catname, catorder, if_view, dir_typename FROM `' . $GLOBALS['db_mymps'] . $type . '` WHERE parentid = \'' . $row['parentid'] . '\' ORDER BY catorder ASC , catid ASC';
	}
	else {
		$sql = 'SELECT catid, catname, catorder, if_view, dir_typename FROM `' . $GLOBALS['db_mymps'] . $type . '` WHERE parentid = \'' . $catid . '\' ORDER BY catorder ASC , catid ASC';
	}

	$res = $GLOBALS['db']->getAll($sql);
	return $res;
}

function get_categories_tree($catid = 0, $type = 'category', $ifview = '2')
{
	$data = read_static_cache($type . '_tree');
	$rewritetype = ($type == 'channel' ? 'news' : 'category');

	if ($catid == 0) {
		if ($data === false) {
			$parentid = 0;
			$bif_view = (($ifview == '2') || ($ifview == '1') ? ' AND a.if_view = \'' . $ifview . '\' AND b.if_view = \'' . $ifview . '\'' : '');
			$sql = 'SELECT a.*, b.catid AS childid, b.catname AS childname, b.color AS childcolor,b.dir_typename AS child_dir_typename,b.htmlpath AS child_htmlpath,b.dir_typename AS child_dir_typename FROM `' . $GLOBALS['db_mymps'] . $type . '` AS a LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS b ON b.parentid = a.catid WHERE a.parentid = \'' . $parentid . '\' ' . $bif_view . ' ORDER BY a.catorder ASC , b.catorder ASC';
			$res = $GLOBALS['db']->getAll($sql);
			$cat_arr = array();

			foreach ($res as $row ) {
				if ($row['if_view']) {
					$cat_arr[$row['catid']]['catid'] = $row['catid'];
					$cat_arr[$row['catid']]['catname'] = $row['catname'];
					$cat_arr[$row['catid']]['color'] = $row['color'];
					$cat_arr[$row['catid']]['if_view'] = $row['if_view'];
					$cat_arr[$row['catid']]['dir_typename'] = $row['dir_typename'];
					$cat_arr[$row['catid']]['uri'] = Rewrite($rewritetype, array('catid' => $row['catid'], 'dir_typename' => $row['dir_typename'], 'dir_typename' => $row['dir_typename']));
					($type == 'category') && ($cat_arr[$row['catid']]['usecoin'] = $row['usecoin']);
					$cat_arr[$row['catid']]['icon'] = $row['icon'];

					if ($row['childid'] != NULL) {
						$cat_arr[$row['catid']]['children'][$row['childid']]['catid'] = $row['childid'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['catname'] = $row['childname'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['if_view'] = $row['if_view'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['color'] = $row['childcolor'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['dir_typename'] = $row['child_dir_typename'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['uri'] = Rewrite($rewritetype, array('catid' => $row['childid'], 'dir_typename' => $row['child_dir_typename'], 'dir_typename' => $row['child_dir_typename']));
						($type == 'category') && ($cat_arr[$row['catid']]['children'][$row['childid']]['usecoin'] = $row['usecoin']);
					}
				}
			}

			write_static_cache($type . '_tree', $cat_arr);
		}
		else {
			$cat_arr = $data;
		}
	}
	else {
		if (($data === NULL) || empty($data[$catid])) {
			$bif_view = (($ifview == '2') || ($ifview == '1') ? ' AND b.if_view = \'' . $ifview . '\'' : '');
			$parentid = $GLOBALS['db']->getOne('SELECT parentid FROM `' . $GLOBALS['db_mymps'] . $type . '` WHERE catid = \'' . $catid . '\'');
			if (($parentid == 0) || $GLOBALS['db']->getOne('SELECT count(catid) FROM `' . $GLOBALS['db_mymps'] . $type . '` WHERE parentid = \'' . $catid . '\'')) {
				$sql = 'SELECT a.*, b.catid AS childid, b.catname AS childname, b.catorder AS childorder,b.dir_typename AS child_dir_typename,b.htmlpath AS child_htmlpath,b.dir_typename AS child_dir_typename FROM `' . $GLOBALS['db_mymps'] . $type . '` AS a LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS b ON b.parentid = a.catid ' . $bif_view . ' WHERE a.catid = \'' . $catid . '\' ORDER BY catorder ASC , childorder ASC';
			}
			else {
				$sql = 'SELECT a.*, b.catid AS childid, b.catname AS childname, b.catorder AS childorder, b.dir_typename AS child_dir_typename,b.dir_typename AS child_dir_typename, b.htmlpath AS child_htmlpath FROM `' . $GLOBALS['db_mymps'] . $type . '` AS a LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS b ON b.parentid = a.catid ' . $bif_view . ' WHERE b.parentid = \'' . $parentid . '\' ORDER BY catorder ASC , childorder ASC';
			}

			$res = $GLOBALS['db']->getAll($sql);
			$cat_arr = array();

			foreach ($res as $row ) {
				if ($row['if_view']) {
					$cat_arr[$row['catid']]['catid'] = $row['catid'];
					$cat_arr[$row['catid']]['catname'] = $row['catname'];
					($type == 'category') && ($cat_arr[$row['catid']]['usecoin'] = $row['usecoin']);
					$cat_arr[$row['catid']]['catorder'] = $row['catorder'];
					$cat_arr[$row['catid']]['if_view'] = $row['if_view'];
					$cat_arr[$row['catid']]['dir_typename'] = $row['dir_typename'];
					$cat_arr[$row['catid']]['uri'] = Rewrite($rewritetype, array('catid' => $row['catid'], 'dir_typename' => $row['dir_typename'], 'dir_typename' => $row['dir_typename']));

					if ($row['childid'] != NULL) {
						$cat_arr[$row['catid']]['children'][$row['childid']]['catid'] = $row['childid'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['catname'] = $row['childname'];
						($type == 'category') && ($cat_arr[$row['catid']]['children'][$row['childid']]['usecoin'] = $row['usecoin']);
						$cat_arr[$row['catid']]['children'][$row['childid']]['if_view'] = $row['if_view'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['catorder'] = $row['childorder'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['dir_typename'] = $row['child_dir_typename'];
						$cat_arr[$row['catid']]['children'][$row['childid']]['uri'] = Rewrite($rewritetype, array('catid' => $row['childid'], 'dir_typename' => $row['child_dir_typename'], 'dir_typename' => $row['child_dir_typename']));
					}
				}
			}
		}
		else {
			$cat_arr[$catid] = $data[$catid];
		}
	}

	return $cat_arr;
}

function get_corp_tree($catid = 0, $type = 'corp')
{
	$data = read_static_cache($type . '_tree');

	if ($catid == 0) {
		if ($data === false) {
			$parentid = 0;
			$sql = 'SELECT a.corpid, a.corpname, b.corpid AS childid, b.corpname AS childname FROM `' . $GLOBALS['db_mymps'] . $type . '` AS a LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS b ON b.parentid = a.corpid WHERE a.parentid = \'' . $parentid . '\' ORDER BY a.corporder ASC , a.corpid ASC, b.corporder ASC';
			$res = $GLOBALS['db']->getAll($sql);
			$cat_arr = array();

			foreach ($res as $row ) {
				$cat_arr[$row['corpid']]['corpid'] = $row['corpid'];
				$cat_arr[$row['corpid']]['corpname'] = $row['corpname'];
				$cat_arr[$row['corpid']]['uri'] = Rewrite('corp', array('catid' => $row['corpid']));

				if ($row['childid'] != NULL) {
					$cat_arr[$row['corpid']]['children'][$row['childid']]['corpid'] = $row['childid'];
					$cat_arr[$row['corpid']]['children'][$row['childid']]['corpname'] = $row['childname'];
					$cat_arr[$row['corpid']]['children'][$row['childid']]['uri'] = Rewrite('corp', array('catid' => $row['childid']));
				}
			}

			write_static_cache($type . '_tree', $cat_arr);
		}
		else {
			$cat_arr = $data;
		}
	}
	else {
		if (($data === NULL) || empty($data[$catid])) {
			$parentid = $GLOBALS['db']->getOne('SELECT parentid FROM `' . $GLOBALS['db_mymps'] . $type . '` WHERE corpid = \'' . $corpid . '\'');

			if ($parentid == 0) {
				$sql = 'SELECT a.corpid, a.corpname, a.corporder, b.corpid AS childid, b.corpname AS childname, b.corporder AS childorder FROM `' . $GLOBALS['db_mymps'] . $type . '` AS a LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS b ON b.parentid = a.corpid WHERE a.corpid = \'' . $catid . '\' ORDER BY corporder ASC , corpid ASC, childorder ASC';
			}
			else {
				$sql = 'SELECT a.corpid, a.corpname, a.corporder, b.corpid AS childid, b.corpname AS childname, b.corporder AS childorder FROM `' . $GLOBALS['db_mymps'] . $type . '` AS a LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS b ON b.parentid = a.catid WHERE b.parentid = \'' . $parentid . '\' ORDER BY corporder ASC , corpid ASC, childorder ASC';
			}

			$res = $GLOBALS['db']->getAll($sql);
			$cat_arr = array();

			foreach ($res as $row ) {
				$cat_arr[$row['corpid']]['corpid'] = $row['corpid'];
				$cat_arr[$row['corpid']]['corpname'] = $row['corpname'];
				$cat_arr[$row['corpid']]['corporder'] = $row['corporder'];
				$cat_arr[$row['corpid']]['uri'] = Rewrite('corp', array('catid' => $row['corpid']));

				if ($row['childid'] != NULL) {
					$cat_arr[$row['corpid']]['children'][$row['childid']]['corpid'] = $row['childid'];
					$cat_arr[$row['corpid']]['children'][$row['childid']]['corpname'] = $row['childname'];
					$cat_arr[$row['corpid']]['children'][$row['childid']]['corporder'] = $row['childorder'];
					$cat_arr[$row['corpid']]['children'][$row['childid']]['uri'] = Rewrite('corp', array('catid' => $row['childid']));
				}
			}
		}
		else {
			$cat_arr[] = $data[$catid];
		}
	}

	return $cat_arr;
}

function get_parent_cats($type = 'category', $cat = '')
{
	if ($cat == 0) {
		return array();
	}

	$data = read_static_cache($type . '_pid_releate');

	if ($data === false) {
		if ($type == 'category') {
			$arr = $GLOBALS['db']->getAll('SELECT catid, catname, parentid, dir_typename,dir_typename FROM `' . $GLOBALS['db_mymps'] . 'category`');
		}
		else if ($type == 'channel') {
			$arr = $GLOBALS['db']->getAll('SELECT catid, catname, parentid, dir_typename FROM `' . $GLOBALS['db_mymps'] . 'channel`');
		}
		else if ($type == 'corp') {
			$arr = $GLOBALS['db']->getAll('SELECT corpid,corpname,parentid FROM `' . $GLOBALS['db_mymps'] . 'corp`');
		}
	}
	else {
		$arr = $data;
	}

	if (empty($arr)) {
		return array();
	}

	$index = 0;
	$cats = array();

	while (1) {
		if ($type == 'corp') {
			foreach ($arr as $row ) {
				if ($cat == $row['corpid']) {
					$cat = $row['parentid'];
					$cats[$index]['corpid'] = $row['corpid'];
					$cats[$index]['corpname'] = $row['corpname'];
					$cats[$index]['uri'] = Rewrite('corp', array('catid' => $row['corpid']));
					$index++;
					break;
				}
			}
		}
		else {
			foreach ($arr as $row ) {
				if ($cat == $row['catid']) {
					$cat = $row['parentid'];
					$cats[$index]['catid'] = $row['catid'];
					$cats[$index]['catname'] = $row['catname'];

					if ($type == 'category') {
						$cats[$index]['uri'] = Rewrite('category', array('catid' => $row['catid'], 'dir_typename' => $row['dir_typename'], 'dir_typename' => $row['dir_typename']));
					}
					else {
						$cats[$index]['uri'] = Rewrite('news', array('catid' => $row['catid'], 'dir_typename' => $row['dir_typename']));
					}

					$index++;
					break;
				}
			}
		}

		if (($index == 0) || ($cat == 0)) {
			break;
		}
	}

	return $cats;
}

function get_child_cats($cat)
{
	if ($cat == 0) {
		return array();
	}

	$catr = $cat;
	$data = read_static_cache('category_pid_releate');

	if ($data === false) {
		$arr = $GLOBALS['db']->getAll('SELECT catid, catname, parentid, dir_typename, dir_typename FROM `' . $GLOBALS['db_mymps'] . 'category`');
	}
	else {
		$arr = $data;
	}

	if (empty($arr)) {
		return array();
	}

	$index = 0;
	$cats = array();

	while (1) {
		foreach ($arr as $row ) {
			if ($cat == $row['parentid']) {
				$cat = $row['has_children'];
				$cats[$index]['catid'] = $row['catid'];
				$cats[$index]['catname'] = $row['catname'];
				$index++;
				break;
			}
		}

		if (($index == 0) || ($cat == 0)) {
			break;
		}
	}

	foreach ($cats as $k => $v ) {
		$catreturn .= $v['catid'] . ',';
	}

	$catreturn = substr($catreturn, 0, -1);
	$catreturn = ($catreturn ? $catr . ',' . $catreturn : $catr);
	return $catreturn;
}

function cat_list($type = 'category', $catid = 0, $selected = 0, $re_type = true, $level = 0, $is_show_all = true)
{
	$data = read_static_cache($type . '_pid_releate');

	if ($data === false) {
		if (in_array($type, array('area', 'corp'))) {
			$sql = 'SELECT c.' . $type . 'id, c.' . $type . 'name, c.parentid, c.' . $type . 'order, COUNT(s.' . $type . 'id) AS has_children FROM `' . $GLOBALS['db_mymps'] . $type . '` AS c LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS s ON s.parentid=c.' . $type . 'id GROUP BY c.' . $type . 'id ORDER BY c.parentid, c.' . $type . 'order ASC';
		}
		else if ($type == 'category') {
			$sql = 'SELECT c.catid, c.modid, c.dir_typename, c.dir_typename, c.catname,c.usecoin, c.parentid, c.if_view, c.catorder, c.template_info, COUNT(s.catid) AS has_children FROM `' . $GLOBALS['db_mymps'] . 'category` AS c LEFT JOIN `' . $GLOBALS['db_mymps'] . 'category` AS s ON s.parentid=c.catid GROUP BY c.catid ORDER BY c.parentid, c.catorder ASC';
		}
		else {
			$sql = 'SELECT c.catid, c.dir_typename, c.dir_typename, c.catname, c.parentid, c.if_view, c.catorder, COUNT(s.catid) AS has_children FROM `' . $GLOBALS['db_mymps'] . $type . '` AS c LEFT JOIN `' . $GLOBALS['db_mymps'] . $type . '` AS s ON s.parentid=c.catid GROUP BY c.catid ORDER BY c.parentid, c.catorder ASC';
		}

		$res = $GLOBALS['db']->getAll($sql);
		$sql = NULL;
		$newres = array();

		if (count($res) <= 1000) {
			write_static_cache($type . '_pid_releate', $res);
		}
	}
	else {
		$res = $data;
	}

	if (empty($res) == true) {
		return $re_type ? '' : array();
	}

	$options = cat_options($type, $catid, $res);
	$children_level = 99999;

	if ($is_show_all == false) {
		foreach ($options as $key => $val ) {
			if ($children_level < $val['level']) {
				unset($options[$key]);
			}
			else if ($val['is_show'] == 0) {
				unset($options[$key]);

				if ($val['level'] < $children_level) {
					$children_level = $val['level'];
				}
			}
			else {
				$children_level = 99999;
			}
		}
	}

	if (0 < $level) {
		if ($catid == 0) {
			$end_level = $level;
		}
		else {
			$first_item = reset($options);
			$end_level = $first_item['level'] + $level;
		}

		foreach ($options as $key => $val ) {
			if ($end_level <= $val['level']) {
				unset($options[$key]);
			}
		}
	}

	if (in_array($type, array('area', 'corp'))) {
		if ($re_type == true) {
			$select = '';

			if (is_array($options)) {
				foreach ($options as $var ) {
					$select .= '<option value="' . $var[$type . 'id'] . '" ';

					if (is_array($selected)) {
						$select .= (in_array($var[$type . 'id'], $selected) ? 'selected=\'ture\' style=\'background-color:#6eb00c; color:white!important;\'' : '');
					}
					else {
						$select .= ($selected == $var[$type . 'id'] ? 'selected=\'ture\' style=\'background-color:#6eb00c; color:white!important;\'' : '');
					}

					$select .= '>';

					if (0 < $var['level']) {
						$select .= str_repeat('&nbsp;', $var['level'] * 4);
					}

					$select .= '└ ' . mhtmlspecialchars($var[$type . 'name'], ENT_QUOTES) . '</option>';
				}
			}

			return $select;
		}
		else {
			if (is_array($options)) {
				foreach ($options as $key => $value ) {
					$options[$key]['url'] = $value[$type . 'id'];
				}
			}

			return $options;
		}
	}
	else if ($re_type == true) {
		$select = '';

		foreach ($options as $var ) {
			$select .= '<option value="' . $var['catid'] . '" ';

			if (is_array($selected)) {
				$select .= (in_array($var['catid'], $selected) ? 'selected=\'ture\' style=\'background-color:#6eb00c; color:white!important;\'' : '');
			}
			else {
				$select .= ($selected == $var['catid'] ? 'selected=\'ture\' style=\'background-color:#6eb00c; color:white!important;\'' : '');
			}

			$select .= '>';

			if (0 < $var['level']) {
				$select .= str_repeat('&nbsp;', $var['level'] * 4);
			}

			$select .= '└ ' . mhtmlspecialchars($var['catname'], ENT_QUOTES) . '</option>';
		}

		return $select;
	}
	else {
		foreach ($options as $key => $value ) {
			$options[$key]['url'] = $value['catid'];
		}

		return $options;
	}
}

function cat_options($type = 'category', $spec_cat_id, $arr)
{
	$cat_options = array();

	if (isset($cat_options[$spec_cat_id])) {
		return $cat_options[$spec_cat_id];
	}

	if (!isset($cat_options[0])) {
		$level = $last_cat_id = 0;
		$options = $cat_id_array = $level_array = array();
		$data = read_static_cache($type . '_option_static');

		if ($data === false) {
			while (!empty($arr)) {
				foreach ($arr as $key => $value ) {
					$cat_id = ($type == 'area' ? $value['areaid'] : ($type == 'corp' ? $value['corpid'] : $value['catid']));
					if (($level == 0) && ($last_cat_id == 0)) {
						if (0 < $value['parentid']) {
							break;
						}

						$options[$cat_id] = $value;
						$options[$cat_id]['level'] = $level;
						$options[$cat_id]['id'] = $cat_id;
						$options[$cat_id]['name'] = ($type == 'category' ? $value['catname'] : $value[$type . 'name']);
						unset($arr[$key]);

						if ($value['has_children'] == 0) {
							continue;
						}

						$last_cat_id = $cat_id;
						$cat_id_array = array($cat_id);
						$level_array[$last_cat_id] = ++$level;
						continue;
					}

					if ($value['parentid'] == $last_cat_id) {
						$options[$cat_id] = $value;
						$options[$cat_id]['level'] = $level;
						$options[$cat_id]['id'] = $cat_id;
						$options[$cat_id]['name'] = ($type == 'category' ? $value['catname'] : $value[$type . 'name']);
						unset($arr[$key]);

						if (0 < $value['has_children']) {
							if (end($cat_id_array) != $last_cat_id) {
								$cat_id_array[] = $last_cat_id;
							}

							$last_cat_id = $cat_id;
							$cat_id_array[] = $cat_id;
							$level_array[$last_cat_id] = ++$level;
						}
					}
					else if ($last_cat_id < $value['parentid']) {
						break;
					}
				}

				$count = count($cat_id_array);

				if (1 < $count) {
					$last_cat_id = array_pop($cat_id_array);
				}
				else if ($count == 1) {
					if ($last_cat_id != end($cat_id_array)) {
						$last_cat_id = end($cat_id_array);
					}
					else {
						$level = 0;
						$last_cat_id = 0;
						$cat_id_array = array();
						continue;
					}
				}

				if ($last_cat_id && isset($level_array[$last_cat_id])) {
					$level = $level_array[$last_cat_id];
				}
				else {
					$level = 0;
				}
			}

			if (count($options) <= 2000) {
				write_static_cache($type . '_option_static', $options);
			}
		}
		else {
			$options = $data;
		}

		$cat_options[0] = $options;
	}
	else {
		$options = $cat_options[0];
	}

	if (!$spec_cat_id) {
		return $options;
	}
	else {
		if (empty($options[$spec_cat_id])) {
			return array();
		}

		$spec_cat_id_level = $options[$spec_cat_id]['level'];

		foreach ($options as $key => $value ) {
			if ($key != $spec_cat_id) {
				unset($options[$key]);
			}
			else {
				break;
			}
		}

		$spec_cat_id_array = array();

		foreach ($options as $key => $value ) {
			if ((($spec_cat_id_level == $value['level']) && (($type == 'area' ? $value['areaid'] : $value['catid']) != $spec_cat_id)) || ($value['level'] < $spec_cat_id_level)) {
				break;
			}
			else {
				$spec_cat_id_array[$key] = $value;
			}
		}

		$cat_options[$spec_cat_id] = $spec_cat_id_array;
		return $spec_cat_id_array;
	}
}

function get_cat_info($catid = 0, $type = 'category')
{
	global $db;
	global $db_mymps;
	return $db->getRow('SELECT * FROM `' . $db_mymps . $type . '` WHERE catid = \'' . $catid . '\'');
}

function has_children($type = 'channel', $catid)
{
	return $GLOBALS['db']->getOne('SELECT catid FROM `' . $GLOBALS['db_mymps'] . 'channel` WHERE parentid = \'' . $catid . '\'');
}


?>
