<?php
class Libraries extends CI_Controller
{

public function __construct() {
   parent::__construct();
   $this->load->helper('url');
}

public function index() {
$libraries = array(
'benchmark',
'cache',
'calendar',
'cart',
'config',
'email',
'encrypt',
'encryption',
'upload',
'ftp',
'image_lib',
'input',
'javascript',
'jquery',
'lang',
'load',
'migration',
'output',
'pagination',
'parser',
'security',
'session',
'table',
'trackback',
'typography',
'unit',
'uri',
'user_agent',
'xmlrpc',
'xmlrpcs',
'zip',
'database'
);

foreach( $libraries AS $library ) {
   echo "<a href='".site_url("libraries/$library")."' target='_blank'>$library</a><br>";
}
}

public function benchmark() {
$this->benchmark->mark('dog');

// Some code happens here
sleep(1);
$this->benchmark->mark('cat');

// More code happens here
sleep(1);
$this->benchmark->mark('bird');

echo $this->benchmark->elapsed_time('dog', 'cat');
echo "<br>";
echo $this->benchmark->elapsed_time('cat', 'bird');
echo "<br>";
echo $this->benchmark->elapsed_time('dog', 'bird');
echo "<br>";
echo $this->benchmark->elapsed_time();
echo "<br>";
echo $this->benchmark->memory_usage();
}

public function cache() {
$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file' , 'key_prefix' => 'my_'));
if ( ! $foo = $this->cache->get('foo'))
{
   echo 'Saving to the cache!<br />';
   $foo = 'foobarbaz!';
   // Save into the cache for 5 minutes
   $this->cache->save('foo', $foo, 300);
}
echo $foo;
}

public function calendar() {
$this->load->library('calendar');
echo $this->calendar->generate();
echo "<br>";
echo $this->calendar->generate(2006, 6);
echo "<br>";
$data = array(
        3  => 'http://example.com/news/article/2006/03/',
        7  => 'http://example.com/news/article/2006/07/',
        13 => 'http://example.com/news/article/2006/13/',
        26 => 'http://example.com/news/article/2006/26/'
);

echo $this->calendar->generate(2006, 6, $data);
echo "<br>";
$prefs = array(
        'start_day'    => 'saturday',
        'month_type'   => 'long',
        'day_type'     => 'short'
);

$this->load->library('calendar', $prefs);
echo $this->calendar->generate();
}

public function cart() {
//DEPRECATED
$this->load->library('cart');

$data = array(
        'id'      => 'sku_123ABC',
        'qty'     => 1,
        'price'   => 39.95,
        'name'    => 'T-Shirt',
        'options' => array('Size' => 'L', 'Color' => 'Red')
);
$this->cart->insert($data);

$data = array(
        'id'      => 'sku_123ABC',
        'qty'     => 1,
        'price'   => 39.95,
        'name'    => 'T-Shirt',
        'coupon'         => 'XMAS-50OFF'
);
$this->cart->insert($data);

$data = array(
        array(
                'id'      => 'sku_123ABC',
                'qty'     => 1,
                'price'   => 39.95,
                'name'    => 'T-Shirt',
                'options' => array('Size' => 'L', 'Color' => 'Red')
        ),
        array(
                'id'      => 'sku_567ZYX',
                'qty'     => 1,
                'price'   => 9.95,
                'name'    => 'Coffee Mug'
        ),
        array(
                'id'      => 'sku_965QRS',
                'qty'     => 1,
                'price'   => 29.95,
                'name'    => 'Shot Glass'
        )
);
$this->cart->insert($data);

$data = array(
        'rowid' => 'b99ccdf16028f015540f341130b6d8ec',
        'qty'   => 3
);
$this->cart->update($data);

//$product_id_rules = '.a-z0-9_-'
//$product_name_rules = 'w -.:'
//$product_name_safe = TRUE
//insert([$items = array()])
//update([$items = array()])
//remove($rowid)
//total()
//total_items()
//contents([$newest_first = FALSE])
//get_item($row_id)
//has_options($row_id = '')
//product_options([$row_id = ''])
//destroy()
}

public function config() {
$this->config->load('filename');
//$this->config->item('item name');
//$lang = $this->config->item('language');
//$config
//$is_loaded
//item($item[, $index=''])
//set_item($item, $value)
//slash_item($item)
//load([$file = ''[, $use_sections = FALSE[, $fail_gracefully = FALSE]]])
//site_url()
//base_url()
//system_url()
}

public function email() {
$this->load->library('email');

$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;
$this->email->initialize($config);

$this->email->from('your@example.com', 'Your Name');
$this->email->to('someone@example.com');
$this->email->cc('another@another-example.com');
$this->email->bcc('them@their-example.com');
$this->email->subject('Email Test');
$this->email->message('Testing the email class.');
$this->email->send();

//from($from[, $name = ''[, $return_path = NULL]])
//reply_to($replyto[, $name = ''])
//to($to)
//cc($cc)
//bcc($bcc[, $limit = ''])
//subject($subject)
//message($body)
//set_alt_message($str)
//set_header($header, $value)
//clear([$clear_attachments = FALSE])
//send([$auto_clear = TRUE])
//attach($filename[, $disposition = ''[, $newname = NULL[, $mime = '']]])
//attachment_cid($filename)
//print_debugger([$include = array('headers', 'subject', 'body')])


}

public function encrypt() {
//DEPRECATED
$this->load->library('encrypt');

//$config['encryption_key'] = "YOUR KEY";
//encode($string[, $key = ''])
//decode($string[, $key = ''])
//set_cipher($cipher)
//set_mode($mode)
//encode_from_legacy($string[, $legacy_mode = MCRYPT_MODE_ECB[, $key = '']])

}

public function encryption() {
$this->load->library('encryption');
//$config['encryption_key'] = 'YOUR KEY';
//$key = bin2hex($this->encryption->create_key(16));
//initialize($params)
//encrypt($data[, $params = NULL])
//decrypt($data[, $params = NULL])
//create_key($length)
//hkdf($key[, $digest = 'sha512'[, $salt = NULL[, $length = NULL[, $info = '']]]])
}

public function upload() {
   $config['upload_path']          = './uploads/';
   $config['allowed_types']        = 'gif|jpg|png';
   $config['max_size']             = 100;
   $config['max_width']            = 1024;
   $config['max_height']           = 768;
   $this->load->library('upload', $config);
//initialize([array $config = array()[, $reset = TRUE]])
//do_upload([$field = 'userfile'])
//display_errors([$open = '<p>'[, $close = '</p>']])
//data([$index = NULL])

}

public function form_validation() {
$this->load->library('form_validation');

//set_rules($field[, $label = ''[, $rules = '']])
//run([$group = ''])
//set_message($lang[, $val = ''])
//set_error_delimiters([$prefix = '<p>'[, $suffix = '</p>']])
//set_data($data)
//reset_validation()
//error_array()
//error_string([$prefix = ''[, $suffix = '']])
//error($field[, $prefix = ''[, $suffix = '']])
//has_rule($field)
}

public function ftp() {
$this->load->library('ftp');

//connect([$config = array()])
//upload($locpath, $rempath[, $mode = 'auto'[, $permissions = NULL]])
//download($rempath, $locpath[, $mode = 'auto'])
//rename($old_file, $new_file[, $move = FALSE])
//move($old_file, $new_file)
//delete_file($filepath)
//delete_dir($filepath)
//list_files([$path = '.'])
//mirror($locpath, $rempath)
//mkdir($path[, $permissions = NULL])
//chmod($path, $perm)
//changedir($path[, $suppress_debug = FALSE])
//close()

}

public function image_lib() {
$this->load->library('image_lib');
//initialize([$props = array()])
//resize()
//crop()
//rotate()
//watermark()
//clear()
//display_errors([$open = '<p>[, $close = '</p>']])
}

public function input() {
print_r($this->input->raw_input_stream);
print_r($this->input->input_stream('key', TRUE)); // XSS Clean
print_r($this->input->input_stream('key', FALSE)); // No XSS filter

//$raw_input_stream
//post([$index = NULL[, $xss_clean = NULL]])
//get([$index = NULL[, $xss_clean = NULL]])
//post_get($index[, $xss_clean = NULL])
//get_post($index[, $xss_clean = NULL])
//cookie([$index = NULL[, $xss_clean = NULL]])
//server($index[, $xss_clean = NULL])
//input_stream([$index = NULL[, $xss_clean = NULL]])
//set_cookie($name = ''[, $value = ''[, $expire = ''[, $domain = ''[, $path = '/'[, $prefix = ''[, $secure = FALSE[, $httponly = FALSE]]]]]]] | [ $array ] )
//ip_address()
//valid_ip($ip[, $which = ''])
//user_agent([$xss_clean = NULL])
//request_headers([$xss_clean = FALSE])
//get_request_header($index[, $xss_clean = FALSE])
//is_ajax_request()
//is_cli_request()
//method([$upper = FALSE])

}

public function javascript() {
//DEPRECATED
//$this->load->library('javascript');
//$this->load->library('javascript',$array);
$this->load->library(
        'javascript',
        array(
                'js_library_driver' => 'scripto',
                'autoload' => FALSE
        )
);
}

public function jquery() {
//DEPRECATED
//$this->load->library('javascript/jquery');
$this->load->library('javascript/jquery', FALSE);
$this->jquery->event('element_path', code_to_run());

//$this->load->library('javascript/jquery', FALSE);
//$this->jquery->event('element_path', code_to_run());
//$this->jquery->effect([optional path] plugin name);
//$this->jquery->hide(target, optional speed, optional extra information);
//$this->jquery->show(target, optional speed, optional extra information);
//$this->jquery->toggle(target);
//$this->jquery->animate(target, parameters, optional speed, optional extra information);
//$this->jquery->fadeIn(target,  optional speed, optional extra information);
//$this->jquery->fadeOut(target,  optional speed, optional extra information);
//$this->jquery->toggleClass(target, class)
//$this->jquery->fadeIn(target,  optional speed, optional extra information);
//$this->jquery->fadeOut(target,  optional speed, optional extra information);
//$this->jquery->slideUp(target,  optional speed, optional extra information);
//$this->jquery->slideDown(target,  optional speed, optional extra information);
//$this->jquery->slideToggle(target,  optional speed, optional extra information);
//$this->jquery->corner(target, corner_style);
//$this->jquery->corner("#note", "cool tl br");
//tablesorter()
//modal()
//calendar()

}

public function lang() {
$this->lang->load('filename', 'language');
$this->lang->load(array('filename1', 'filename2'));
$this->lang->line('language_key');
$this->lang->line('misc_key', FALSE);

//$this->lang->load('filename', 'language');
//$this->lang->load(array('filename1', 'filename2'));
//$this->lang->line('language_key');
//$this->lang->line('misc_key', FALSE);
//load($langfile[, $idiom = ''[, $return = FALSE[, $add_suffix = TRUE[, $alt_path = '']]]])
//line($line[, $log_errors = TRUE])

}

public function load() {
//library($library[, $params = NULL[, $object_name = NULL]])
//driver($library[, $params = NULL[, $object_name]])
//view($view[, $vars = array()[, return = FALSE]])
//vars($vars[, $val = ''])
//get_var($key)
//get_vars()
//clear_vars()
//model($model[, $name = ''[, $db_conn = FALSE]])
//database([$params = ''[, $return = FALSE[, $query_builder = NULL]]])
//dbforge([$db = NULL[, $return = FALSE]])
//dbutil([$db = NULL[, $return = FALSE]])
//helper($helpers)
//file($path[, $return = FALSE])
//language($files[, $lang = ''])
//config($file[, $use_sections = FALSE[, $fail_gracefully = FALSE]])
//is_loaded($class)
//add_package_path($path[, $view_cascade = TRUE])
//remove_package_path([$path = ''])
//get_package_paths([$include_base = TRUE])

}

public function migration() {
//current()
//error_string()
//find_migrations()
//latest()
//version($target_version)
}

public function output() {
//$this->output->parse_exec_vars = FALSE;
$data = array('a'=>'A','b'=>'B','c'=>'C');
$this->output->set_output($data);

$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('foo' => 'bar')));

$this->output
        ->set_content_type('jpeg') // You could also use ".jpeg" which will have the full stop removed before looking in config/mimes.php
        ->set_output(file_get_contents('files/something.jpg'));

$mime = $this->output->get_content_type();

$this->output->set_content_type('text/plain', 'UTF-8');
echo $this->output->get_header('content-type');

$string = $this->output->get_output();

$this->output->append_output($data);

//$this->output->set_header('HTTP/1.0 200 OK');
//$this->output->set_header('HTTP/1.1 200 OK');
//$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
//$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
//$this->output->set_header('Cache-Control: post-check=0, pre-check=0');
//$this->output->set_header('Pragma: no-cache');

$this->output->enable_profiler(TRUE);
$this->output->enable_profiler(FALSE);

$response = array('status' => 'OK');

$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
exit;

//$parse_exec_vars = TRUE;
//set_output($output)
//set_content_type($mime_type[, $charset = NULL])
//get_content_type()
//get_header($header)
//get_output()
//append_output($output)
//set_header($header[, $replace = TRUE])
//set_status_header([$code = 200[, $text = '']])
//enable_profiler([$val = TRUE])
//set_profiler_sections($sections)
//cache($time)
//_display([$output = ''])

}

public function pagination() {
$this->load->library('pagination');
$config['base_url'] = 'http://example.com/index.php/test/page/';
$config['total_rows'] = 200;
$config['per_page'] = 20;
$this->pagination->initialize($config);
echo $this->pagination->create_links();

//initialize([$params = array()])
//create_links()
}

public function parser() {
$this->load->library('parser');
$data = array(
        'blog_title' => 'My Blog Title',
        'blog_heading' => 'My Blog Heading'
);
$this->parser->parse('blog_template', $data);
//$string = $this->parser->parse('blog_template', $data, TRUE);
//parse($template, $data[, $return = FALSE])
//parse_string($template, $data[, $return = FALSE])
//set_delimiters([$l = '{'[, $r = '}']])

}

public function security() {
$data = $this->security->xss_clean($data);
//xss_clean($str[, $is_image = FALSE])
//sanitize_filename($str[, $relative_path = FALSE])
//get_csrf_token_name()
//get_csrf_hash()
//entity_decode($str[, $charset = NULL])
//get_random_bytes($length)

}

public function session() {
$this->load->library('session');

if(rand(0,1) === 1) {
   echo "FLASH : ".$this->session->flashdata('item')."<br>";
   $this->session->unset_userdata('item');
   echo "TEMP : ".$this->session->tempdata('tempitem')."<br>";
}

if(!$this->session->userdata('item') && !$this->session->has_userdata('item'))
{
   $this->session->set_userdata('item','item_value');
   $this->session->userdata('item');
   
   //setting flash data
   $this->session->mark_as_flash('item');
   //$this->session->set_flashdata('item', 'item_value');
   
   //setting tempdata
   //$this->session->mark_as_temp('itemtemp', 300);
   $this->session->set_tempdata('tempitem', 'value'.date('hhmmss'), 10);
   echo "item value set <br>";
}

print_r($this->session->all_userdata()); //deprecated
$this->htmlbr();
$this->htmlp(print_r($this->session->get_flash_keys(),true));
$this->htmlp(print_r($this->session->get_temp_keys(),true));

//sess_regenerate(FALSE);
//sess_destroy();
//session_destroy();

}

public function table() {
$this->load->library('table');

//$query = $this->db->query('SELECT * FROM my_table');
//echo $this->table->generate($query);

$this->table->set_heading('Name', 'Color', 'Size');
$this->table->add_row('Fred', 'Blue', 'Small');
$this->table->add_row('Mary', 'Red', 'Large');
$this->table->add_row('John', 'Green', 'Medium');
echo $this->table->generate();

$this->load->library('table');

$this->table->set_heading(array('Name', 'Color', 'Size'));
$this->table->add_row(array('Fred', 'Blue', 'Small'));
$this->table->add_row(array('Mary', 'Red', 'Large'));
$this->table->add_row(array('John', 'Green', 'Medium'));
echo $this->table->generate();
$template = array(
        'table_open'            => '<table border="0" cellpadding="4" cellspacing="0">',

        'thead_open'            => '<thead>',
        'thead_close'           => '</thead>',

        'heading_row_start'     => '<tr>',
        'heading_row_end'       => '</tr>',
        'heading_cell_start'    => '<th>',
        'heading_cell_end'      => '</th>',

        'tbody_open'            => '<tbody>',
        'tbody_close'           => '</tbody>',

        'row_start'             => '<tr>',
        'row_end'               => '</tr>',
        'cell_start'            => '<td>',
        'cell_end'              => '</td>',

        'row_alt_start'         => '<tr>',
        'row_alt_end'           => '</tr>',
        'cell_alt_start'        => '<td>',
        'cell_alt_end'          => '</td>',

        'table_close'           => '</table>'
);
$this->table->set_template($template);

}

public function trackback() {
$this->load->library('trackback');
$tb_data = array(
        'ping_url'  => 'http://localhost/2015/ci-three-examples/public/index.php/Demo_libraries/trackback_recieve',
        'url'       => 'http://www.my-example.com/blog/entry/123',
        'title'     => 'The Title of My Entry',
        'excerpt'   => 'The entry content.',
        'blog_name' => 'My Blog Name',
        'charset'   => 'utf-8'
);
if ( ! $this->trackback->send($tb_data))
{
   echo $this->trackback->display_errors();
}
else
{
   echo 'Trackback was sent!';
}
}

public function trackback_recieve()
{
$this->load->library('trackback');
$this->load->database();

if ($this->uri->segment(3) == FALSE)
{
        $this->trackback->send_error('Unable to determine the entry ID');
}

if ( ! $this->trackback->receive())
{
        $this->trackback->send_error('The Trackback did not contain valid data');
}

$data = array(
        'tb_id'      => '',
        'entry_id'   => $this->uri->segment(3),
        'url'        => $this->trackback->data('url'),
        'title'      => $this->trackback->data('title'),
        'excerpt'    => $this->trackback->data('excerpt'),
        'blog_name'  => $this->trackback->data('blog_name'),
        'tb_date'    => time(),
        'ip_address' => $this->input->ip_address()
);

$sql = $this->db->insert_string('trackbacks', $data);
$this->db->query($sql);

$this->trackback->send_success();
}

public function typography() {
$this->load->library('typography');
//$this->typography->protect_braced_quotes = TRUE;
$this->htmlp($this->typography->format_characters(" a simple's quites 'quoted' ... ellipsis "));
$this->htmlp($this->typography->nl2br_except_pre("text is not ignored <br> second line <pre>pre defined text</pre>"));
}

public function unit() {

//$this->unit->use_strict(TRUE);
//$this->unit->active(FALSE);
//$this->unit->set_test_items(array('test_name', 'result'));

/*$str = '
<table border="0" cellpadding="4" cellspacing="1">
{rows}
        <tr>
                <td>{item}</td>
                <td>{result}</td>
        </tr>
{/rows}
</table>';
$this->unit->set_template($str);
*/

$this->load->library('unit_test');
//is_object
//is_string
//is_bool
//is_true
//is_false
//is_int
//is_numeric
//is_float
//is_double
//is_array
//is_null

$test = 1 + 1;
$expected_result = 2;
$test_name = 'Adds one plus one';
$this->unit->run($test, $expected_result, $test_name);

$test = 2 + 2;
$expected_result = 4;
$test_name = 'Adds two plus two';
$this->unit->run($test, $expected_result, $test_name);

$this->htmlp(print_r($this->unit->result(),true));

}

public function uri() {
   //$product_id = $this->uri->segment(3, 0);
   //rsegment($n[, $no_result = NULL])
   //slash_segment($n[, $where = 'trailing'])
   //slash_rsegment($n[, $where = 'trailing'])
   //uri_to_assoc([$n = 3[, $default = array()]])
   //ruri_to_assoc([$n = 3[, $default = array()]])
   //assoc_to_uri($array)
   //uri_string()
   //ruri_string()
   //total_segments()
   //total_rsegments()
   //segment_array()
   //rsegment_array()
}

public function user_agent() {
$this->load->library('user_agent');
if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}

echo $agent;

echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
}

public function xmlrpc() {
$this->load->library('xmlrpc');
$this->xmlrpc->server('http://rpc.pingomatic.com/', 80);
$this->xmlrpc->method('weblogUpdates.ping');

$request = array('My Photoblog', 'http://www.my-site.com/photoblog/');
$this->xmlrpc->request($request);

if ( ! $this->xmlrpc->send_request())
{
        echo $this->xmlrpc->display_error();
}

$request = array('John', 'Doe', 'www.some-site.com');
$this->xmlrpc->request($request);

$request = array(
        array('John', 'string'),
        array('Doe', 'string'),
        array(FALSE, 'boolean'),
        array(12345, 'int')
);
$this->xmlrpc->request($request);

}

public function xmlrpcs () {
$this->load->library('xmlrpcs');

$this->load->library('xmlrpc');
$this->load->library('xmlrpcs');

$config['functions']['new_post'] = array('function' => 'My_blog.new_entry');
$config['functions']['update_post'] = array('function' => 'My_blog.update_entry');
$config['object'] = $this;

$this->xmlrpcs->initialize($config);
$this->xmlrpcs->serve();

}

public function zip() {
$this->load->library('zip');

$name = 'mydata1.txt';
$data = 'A Data String!';

$this->zip->add_data($name, $data);

// Write the zip file to a folder on your server. Name it "my_backup.zip"
$this->zip->archive('/path/to/directory/my_backup.zip');

// Download the file to your desktop. Name it "my_backup.zip"
$this->zip->download('my_backup.zip');

}

public function database() {

}

private function htmlp($string='') {
   echo "<p>$string</p>";
}

private function htmlbr() {
   echo "<br />";
}


}
