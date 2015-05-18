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
   echo "<a href='".site_url("Demo_libraries/$library")."' target='_blank'>$library</a><br>";
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
$this->load->library('cart');
}

public function config() {
$this->config->load('filename');

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
}

public function encrypt() {
$this->load->library('encrypt');

}

public function encryption() {
$this->load->library('encryption');

}

public function upload() {
   $config['upload_path']          = './uploads/';
   $config['allowed_types']        = 'gif|jpg|png';
   $config['max_size']             = 100;
   $config['max_width']            = 1024;
   $config['max_height']           = 768;
   $this->load->library('upload', $config);
}

public function form_validation() {
$this->load->library('form_validation');
}

public function ftp() {
$this->load->library('ftp');
}

public function image_lib() {
$this->load->library('image_lib');
}

public function input() {
print_r($this->input->raw_input_stream);
print_r($this->input->input_stream('key', TRUE)); // XSS Clean
print_r($this->input->input_stream('key', FALSE)); // No XSS filter
}

public function javascript() {
//DEPRECATED
//$this->load->library('javascript');
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
}

public function lang() {
$this->lang->load('filename', 'language');
$this->lang->load(array('filename1', 'filename2'));
$this->lang->line('language_key');
$this->lang->line('misc_key', FALSE);
}

public function load() {

}

public function migration() {

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

}

public function pagination() {
$this->load->library('pagination');
$config['base_url'] = 'http://example.com/index.php/test/page/';
$config['total_rows'] = 200;
$config['per_page'] = 20;
$this->pagination->initialize($config);

echo $this->pagination->create_links();
}

public function parser() {
$this->load->library('parser');
$data = array(
        'blog_title' => 'My Blog Title',
        'blog_heading' => 'My Blog Heading'
);
$this->parser->parse('blog_template', $data);
//$string = $this->parser->parse('blog_template', $data, TRUE);
}

public function security() {
$data = $this->security->xss_clean($data);
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
