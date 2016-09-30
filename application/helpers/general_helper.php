<?php
function get_users_groups() {
	$ci = & get_instance();
	$ci->db->select('*')
			->from('groups')
			->order_by('name');
	$query = $ci->db->get();
	return $query->result_array();
}


function pr($data,$status=true) 
{
    echo "<pre>";
        print_r($data);
    echo "</pre>";
    if($status)
    {
        die;    
    }
    return true;
}

function createParentCategoryDropDownElement($name = "parent_id", $default = null)
{
    $ci = &get_instance();
    
    $ci->db->select('*')   
        ->from('categories')
        ->where('parent_id', 0)
        ->order_by('title');

    $query = $ci->db->get();

    $html  = '<select name="'.$name.'" id="'.$name.' " class="form-control">';
    $html .= '<option value="null"> ROOT </option>';
    foreach($query->result_array() as $category)
    {
        $selected = "";

        if(isset($default) && $default == $category['id'])
        {
            $selected = 'selected="selected"';
        }

        $html .= '<option '.$selected.'  value="'.$category['id'].'">
                    '.$category['title'].'
                </option>';
    }
    $html .= "</select>";
    return $html;
}

function getChildCategory($parentId = null, $title = null)
{
    if($parentId)
    {
        $ci = &get_instance();
        
        $ci->db->select('*')   
            ->from('categories')
            ->where('parent_id', $parentId)
            ->order_by('title');

        $query = $ci->db->get();
        $html = "";
        foreach($query->result_array() as $category)
        {
            $showImage = "";
            if(isset($category['image']) && !empty($category['image']))
            {
                $showImage = '<img width="50" height="50" class="circle" src="'.site_url().'/assets/category-images/'.$category['image'].'">';
            }
            $html .= '<tr id="record_'.$category['id'].'">
                        <td>
                            '.$category['id'].'
                        </td>
                        <td>
                            '.$title.'
                        </td>
                        <td>
                            '.$category['title'].'
                        </td>
                        <td> '. $category['category_link'] .'</td>
                        <td> 
                           '.$showImage.'
                        </td>
                        <td>
                            <span class="delete-data btn btn-success" data-id="'.$category['id'].'">
                                Delete
                            </span>
                        </td>
                    </tr>';
        }

        return $html;
    }

    return false;
}

function getAssociates($asscoateId = null)
{
    $ci = & get_instance();
    $ci->db->select('*')
            ->from('associates')
            ->where('status', 1)
            ->order_by('associate_title');

    $query = $ci->db->get();

    $html = '<select class="form-control"  name="associate_id"><option value="0">Please Select Associate</option>';
    foreach($query->result_array() as $associate)
    {
        $selected = "";

        if($asscoateId && $asscoateId == $associate['id'])
        {
            $selected = 'selected="selected"';            
        }
        $html .= '<option '.$selected.' value="'.$associate['id'].'"> '.$associate['associate_title'].' </option>';
    }

    $html .= '</select>';
    
    return $html;
}

function getAssociateTitle($associateId = null)
{
    $ci = & get_instance();
    $ci->db->select('associate_title')
            ->from('associates')
            ->where('id', $associateId);
    $query = $ci->db->get();

    return $query->row()->associate_title;
}