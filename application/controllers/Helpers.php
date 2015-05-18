<?php
class Helpers extends CI_Controller
{

public function __construct() {
   parent::__construct();
   $this->load->helper('url');
}

public function index() {
$helpers = array(
'array_helper',
'captcha_helper',
'cookie_helper',
'date_helper',
'directory_helper',
'download_helper',
'email_helper',
'file_helper',
'form_helper',
'html_helper',
'inflector_helper',
'language_helper',
'number_helper',
'path_helper',
'security_helper',
'smiley_helper',
'string_helper',
'text_helper',
'typography_helper',
'url_helper',
'xml_helper',
);

foreach( $helpers AS $helper ) {
echo "<a href='".site_url("Demo_helpers/$helper")."' target='_blank'>$helper</a><br>";
}
}

public function array_helper() {
   $this->load->helper('array');
   $arr1 = array('one','two','three');
   $arr2 = array('a' => 'A' , 'b' => 'B' , 'c' => 'C');
   echo element(1,$arr1,0);
   echo "<br>";
   echo element(4,$arr1,0);
   echo "<br>";
   echo element('b',$arr2,0);
   echo "<br>";
   print_r(elements(array(1,4,5),$arr1,0));
   echo "<br>";
   print_r(random_element($arr2));
}

public function captcha_helper() {
   $this->load->helper('captcha');
   $vals = array(
      'word'          => 'Random word',
      'img_path'      => './captcha/',
      'img_url'       => base_url('/captcha'),
      'font_path'     => './path/to/fonts/texb.ttf',
      'img_width'     => '150',
      'img_height'    => 30,
      'expiration'    => 7200,
      'word_length'   => 8,
      'font_size'     => 16,
      'img_id'        => 'Imageid',
      'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
      // White background and border, black text and red grid
      'colors'        => array(
                           'background' => array(255, 255, 255),
                           'border' => array(255, 255, 255),
                           'text' => array(0, 0, 0),
                           'grid' => array(255, 40, 40)
                         )
);

$cap = create_captcha($vals);
echo $cap['image'];
}

public function cookie_helper() {
   $this->load->helper('cookie');
   set_cookie('ci', 'cookie_value', 3600,'','/','prefix',FALSE,FALSE);
   set_cookie('cisecure', 'secure_cookie_value', 3600,'','/','prefix',TRUE,FALSE);
   set_cookie('cihttp', 'http_cookie_value', 3600,'','/','prefix',FALSE,TRUE);
   set_cookie('cisecurehttp', 'secure_http_cookie_value', 3600,'','/','prefix',TRUE,TRUE);
   echo get_cookie('prefixci',TRUE);
   echo get_cookie('prefixcisecure',TRUE);
   echo get_cookie('prefixcihttp',TRUE);
   echo get_cookie('prefixcisecurehttp',TRUE);
   //delete_cookie('prefixci');
   //delete_cookie('prefixcisecure');
   //delete_cookie('prefixcihttp');
   //delete_cookie('prefixcisecurehttp');
}

public function date_helper() {
$this->load->helper('date');
echo now('Australia/Victoria');
echo "<br>";
echo now('+8');
echo "<br>";

$datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
$time = time();
echo mdate($datestring, $time); //at UTC
echo "<br>";

$format = 'DATE_RFC822';
$time = time();
echo standard_date($format, $time); //Deprecated
echo "<br>";

echo date(DATE_RFC822, time());
echo "<br>";

echo local_to_gmt(time());
echo "<br>";

$timestamp = 1140153693;
$timezone  = 'UM8';
$daylight_saving = TRUE;
echo gmt_to_local($timestamp, $timezone, $daylight_saving);

echo "<br>";
echo "<br>";
$unix = mysql_to_unix('20061124092345');
echo $unix;
echo "<br>";
echo "<br>";

$now = time();
echo unix_to_human($now); // U.S. time, no seconds
echo "<br>";
echo unix_to_human($now, TRUE, 'us'); // U.S. time with seconds
echo "<br>";
echo unix_to_human($now, TRUE, 'eu'); // Euro time with seconds
echo "<br>";
echo "<br>";

$now = time();
$human = unix_to_human($now);
$unix = human_to_unix($human);
echo $human;
echo "<br>";
echo $unix;
echo "<br>";
echo "<br>";

echo "<br>";
$bad_date = '199605';
// Should Produce: 1996-05-01
$better_date = nice_date($bad_date, 'Y-m-d');
echo $bad_date;
echo "<br>";
echo $better_date;
echo "<br>";
echo "<br>";

$bad_date = '9-11-2001';
// Should Produce: 2001-09-11
$better_date = nice_date($bad_date, 'Y-m-d');
echo $bad_date;
echo "<br>";
echo $better_date;
echo "<br>";
echo "<br>";

$post_date = '1079621429';
$now = time();
$units = 2;
echo timespan($post_date, $now, $units);
echo "<br>";
echo "<br>";

echo days_in_month(06, 2005);
echo "<br>";
echo "<br>";

$range = date_range('2012-01-01', '2012-01-15');
echo "First 15 days of 2012:";
foreach ($range as $date)
{
   echo $date."\n";
}
echo "<br>";
echo "<br>";

echo timezones('UM5');
echo "<br>";
echo "<br>";

echo timezone_menu('UM8');
echo "<br>";
echo "<br>";
}

public function directory_helper() {
$this->load->helper('directory');
$map = directory_map('./');
print_r($map);
}

public function download_helper() {
$this->load->helper('download');
$data = 'Here is some text!';
$name = 'mytext.txt';
force_download($name, $data);

// Contents of photo.jpg will be automatically read
//force_download('/path/to/photo.jpg', NULL);
}

public function email_helper() {
//Email Helper is DEPRICATED , kept for backwards compatability
//Use Email Library Class

$this->load->helper('email');

if (valid_email('email@somesite.com'))
{
        echo 'email is valid';
}
else
{
        echo 'email is not valid';
}

$recipient = "name@google.com";
$subject = "email subject";
$message = "email message";

//DEPRICATED
send_email($recipient, $subject, $message);

}

public function file_helper() {
$this->load->helper('file');
$string = read_file('./path/to/file.php');

$data = 'Some file data';
if ( ! write_file('./path/to/file.php', $data))
{
   echo 'Unable to write the file';
   echo "<br>";
}
else
{
   echo 'File written!';
   echo "<br>";
}

write_file('./path/to/file.php', $data, 'r+');
echo "<br>";

delete_files('./path/to/directory/');
echo "<br>";

delete_files('./path/to/directory/', TRUE);
echo "<br>";

$controllers = get_filenames(APPPATH.'controllers/');
echo "<br>";

$models_info = get_dir_file_info(APPPATH.'models/');
echo "<br>";

$file = 'somefile.png';
echo $file.' is has a mime type of '.get_mime_by_extension($file);
echo "<br>";

echo symbolic_permissions(fileperms('./index.php'));  // -rw-r--r--
echo "<br>";

echo octal_permissions(fileperms('./index.php')); // 644
echo "<br>";

}

public function form_helper() {
$this->load->helper('form');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('email/send', $attributes);
//echo form_open_multipart('email/send', $attributes);

$data = array(
        'name'  => 'John Doe',
        'email' => 'john@example.com',
        'url'   => 'http://example.com'
);
echo form_hidden($data);

$data = array(
        'name'  => 'John Doe',
        'email' => 'john@example.com',
        'url'   => 'http://example.com'
);
echo form_hidden('my_array', $data);

$data = array(
        'type'  => 'hidden',
        'name'  => 'email',
        'id'    => 'hiddenemail',
        'value' => 'john@example.com',
        'class' => 'hiddenemail'
);
echo form_input($data);

$data = array(
        'name'          => 'username',
        'id'            => 'username',
        'value'         => 'johndoe',
        'maxlength'     => '100',
        'size'          => '50',
        'style'         => 'width:50%'
);
echo form_input($data);

$options = array(
        'small'         => 'Small Shirt',
        'med'           => 'Medium Shirt',
        'large'         => 'Large Shirt',
        'xlarge'        => 'Extra Large Shirt',
);

$shirts_on_sale = array('small', 'large');
echo form_dropdown('shirts', $options, 'large');
echo form_dropdown('shirts', $options, $shirts_on_sale);
$js = 'id="shirts" onChange="some_function();"';
echo form_dropdown('shirts', $options, 'large', $js);

echo form_fieldset('Address Information');
echo "<p>fieldset content here</p>\n";
echo form_fieldset_close();

$attributes = array(
        'id'    => 'address_info',
        'class' => 'address_info'
);

echo form_fieldset('Address Information', $attributes);
echo "<p>fieldset content here</p>\n";
echo form_fieldset_close();

echo form_checkbox('newsletter', 'accept', TRUE);

$js = 'onClick="some_function()"';
echo form_checkbox('newsletter', 'accept', TRUE, $js);

echo form_label('What is your Name', 'username');

$attributes = array(
        'class' => 'mycustomclass',
        'style' => 'color: #000;'
);
echo form_label('What is your Name', 'username', $attributes);

echo form_submit('mysubmit', 'Submit Post!');

echo form_button('name','content');

$data = array(
        'name'          => 'button',
        'id'            => 'button',
        'value'         => 'true',
        'type'          => 'reset',
        'content'       => 'Reset'
);
echo form_button($data);

$js = 'onClick="some_function()"';
echo form_button('mybutton', 'Click Me', $js);

echo form_error('myfield', '<div class="error">', '</div>');

echo validation_errors('<span class="error">', '</span>');

echo form_close();
}

public function html_helper() {
$this->load->helper('html');

echo doctype('html5');

echo meta('description', 'My Great site');
// Generates:  <meta name="description" content="My Great Site" />

echo meta('Content-type', 'text/html; charset=utf-8', 'equiv');
// Note the third parameter.  Can be "equiv" or "name"
// Generates:  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

echo meta(array('name' => 'robots', 'content' => 'no-cache'));
// Generates:  <meta name="robots" content="no-cache" />

$meta = array(
        array(
                'name' => 'robots',
                'content' => 'no-cache'
        ),
        array(
                'name' => 'description',
                'content' => 'My Great Site'
        ),
        array(
                'name' => 'keywords',
                'content' => 'love, passion, intrigue, deception'
        ),
        array(
                'name' => 'robots',
                'content' => 'no-cache'
        ),
        array(
                'name' => 'Content-type',
                'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
        )
);
echo meta($meta);

echo link_tag('css/mystyles.css');
echo link_tag('favicon.ico', 'shortcut icon', 'image/ico');
echo link_tag('feed', 'alternate', 'application/rss+xml', 'My RSS Feed');
$link = array(
        'href'  => 'css/printer.css',
        'rel'   => 'stylesheet',
        'type'  => 'text/css',
        'media' => 'print'
);
echo link_tag($link);

echo heading('Welcome!', 3);
echo heading('Welcome!', 3, 'class="pink"');
echo heading('How are you?', 4, array('id' => 'question', 'class' => 'green'));
echo "<br>";
echo img('images/picture.jpg');
echo img('images/picture.jpg', TRUE); 
$image_properties = array(
        'src'   => 'images/picture.jpg',
        'alt'   => 'Me, demonstrating how to eat 4 slices of pizza at one time',
        'class' => 'post_images',
        'width' => '200',
        'height'=> '200',
        'title' => 'That was quite a night',
        'rel'   => 'lightbox'
);
img($image_properties);

$list = array(
        'red',
        'blue',
        'green',
        'yellow'
);
$attributes = array(
        'class' => 'boldlist',
        'id'    => 'mylist'
);
echo ul($list, $attributes);

$attributes = array(
        'class' => 'boldlist',
        'id'    => 'mylist'
);

$list = array(
        'colors'  => array(
                'red',
                'blue',
                'green'
        ),
        'shapes'  => array(
                'round',
                'square',
                'circles' => array(
                        'ellipse',
                        'oval',
                        'sphere'
                )
        ),
        'moods'  => array(
                'happy',
                'upset' => array(
                        'defeated' => array(
                                'dejected',
                                'disheartened',
                                'depressed'
                        ),
                        'annoyed',
                        'cross',
                        'angry'
                )
        )
);
echo ul($list, $attributes);

echo br(3);

echo nbs(10);

echo br(3);

}

public function inflector_helper() {
$this->load->helper('inflector');
echo singular('dogs');
echo "<br>";
echo plural('dog');
echo "<br>";
echo camelize('my_dog_spot'); // Prints 'myDogSpot'
echo "<br>";
echo underscore('my dog spot'); // Prints 'my_dog_spot'
echo "<br>";
echo humanize('my_dog_spot'); // Prints 'My Dog Spot'
echo "<br>";
echo humanize('my-dog-spot', '-'); // Prints 'My Dog Spot'
echo "<br>";
echo is_countable('equipment'); // Returns FALSE
}

public function language_helper() {
$this->load->helper('language');

}

public function number_helper() {
$this->load->helper('number');

}

public function path_helper() {
$this->load->helper('path');

}

public function security_helper() {
$this->load->helper('security');

}

public function smiley_helper() {
$this->load->helper('smiley');

}

public function string_helper() {
$this->load->helper('string');
$this->htmlp(random_string('alnum', 16));

$this->htmlp(increment_string('file', '_')); // "file_1"
$this->htmlp(increment_string('file', '-', 2)); // "file-2"
$this->htmlp(increment_string('file_4')); // "file_5"

for ($i = 0; $i < 10; $i++)
{
   $this->htmlp(alternator('one', 'two', 'three', 'four', 'five'));
}

$string = "|repeat";
$this->htmlp(repeater($string, 30)); // DEPRECATED

$string = "http://example.com//index.php";
$this->htmlp(reduce_double_slashes($string)); // results in "http://example.com/index.php"

$string = "/this/that/theother/";
$this->htmlp(trim_slashes($string)); // results in this/that/theother

$string = "Fred, Bill,, Joe, Jimmy";
$string = reduce_multiples($string,","); //results in "Fred, Bill, Joe, Jimmy"
$this->htmlp($string);

$string = ",Fred, Bill,, Joe, Jimmy,";
$string = reduce_multiples($string, ", ", TRUE); //results in "Fred, Bill, Joe, Jimmy"
$this->htmlp($string);

$string = "Joe's \"dinner\"";
$string = quotes_to_entities($string); //results in "Joe&#39;s &quot;dinner&quot;"
$this->htmlp($string);

$string = "Joe's \"dinner\"";
$string = strip_quotes($string); //results in "Joes dinner"
$this->htmlp($string);
}

public function text_helper() {
$this->load->helper('text');
$string = "Here is a nice text string consisting of eleven words.";
$string = word_limiter($string, 4 , "...");
$this->htmlp($string);

$string = "Here is a nice text string consisting of eleven words.";
$string = character_limiter($string, 20 , "...");
$this->htmlp($string);

$string = ascii_to_entities($string);
$this->htmlp($string);

$string = convert_accented_characters($string);
$this->htmlp($string);

$string = "darn shit sucks dinner";
$disallowed = array('darn', 'shucks', 'golly', 'phooey');
$string = word_censor($string, $disallowed, 'Beep!');
$this->htmlp($string);

$string = highlight_code($string);
$this->htmlp($string);

$string = "Here is a nice text string about nothing in particular.";
$this->htmlp(highlight_phrase($string, "nice text", '<span style="color:#990000;">', '</span>'));

$string = "Here is a simple string of text that will help us demonstrate this function.";
$this->htmlp(word_wrap($string, 25));

$str = 'this_string_is_entirely_too_long_and_might_break_my_design.jpg';
$this->htmlp(ellipsize($str, 32, .5));

}

public function typography_helper() {
$this->load->helper('typography');

}

public function url_helper() {
$this->load->helper('url');

}

public function xml_helper() {
$this->load->helper('xml');

}

private function htmlp($string='') {
   echo "<p>$string</p>";
}

private function htmlbr() {
   echo "<br />";
}

}
