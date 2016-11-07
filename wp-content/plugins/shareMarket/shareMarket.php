<?php
/**
* Plugin Name: Share Market
* Author: Hitesh Sofat
* Url:hiteshkumarsofat@wordpress.com
*/
class shareMarket_widget extends WP_Widget{
	function __construct(){
		parent::__construct(
			'wpd_Beginner',__('Share Market', 'shareMarket_domain'),array( 'description' => __( 'Sample widget based on Share Market', 'shareMarket_domain' ), )
		);
	}

public function widget($args,$instance){
	$title = apply_filters('widget_title',$instance['title']);
	if(! empty($title))?>
	<div class="widget widget_meta">
	<?php
	
		echo $args['before_title'].$title.$args['after_title'];
?>
<div ng-app="shareMarket">
 <div ng-controller="Graph">


<div class="graphContainer" ng-init="bse();activeBse='active'">
	<ul class="nav nav-tabs">
		<li class="{{activeBse}}"><a  ng-click="bse();activeBse='active';activeNse=''">BSE</a></li>
		<li class="{{activeNse}}"><a  ng-click="nse();activeBse='';activeNse='active'">NSE</a></li>
	</ul>
	<div class=" row">
		<div class="row">
			<div  class="col-sm-6"><h5 style="font-size:13px;";><b>&#8377;{{open}}</b></h5></div>
				<div class="col-sm-6" >
				<span ng-if="gain>0"><h5 style="font-size:10px";><b>{{gain}} (%{{cp_fix}})</b>
					</h5>
				</span>
				<span ng-if="gain<0" class="low"><h5 class="low" style="font-size:10px;"><b>{{gain}} (%{{cp_fix}})</b>
				</h5></span>
				</div>
		</div>
	<div id="placeholder" class="demo-placeholder" style="width:100%;height:170px;"></div>
		
	<table class="table" id="shareTable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Change</th>
			<th>% Cha</th>
			</tr>
	</thead>
		<tbody>
			<tr ng-repeat="getAllData in allData track by $index">
				<td class="mainHeading"><span>{{companyName[$index]}}</span></td>
				<td> 
					<span ng-if="getAllData.l>0" class="high" id="cost" >&#8377;{{getAllData.l}}</span>
					<span ng-if="getAllData.l<0" class="low" id="cost" >&#8377;{{getAllData.l}}</span>
				</td>
				<td>
					<span ng-if="getAllData.c>0" class="high" id="otherCost">{{getAllData.c}}</span>
					<span ng-if="getAllData.c<0" class="low" id="otherCost">{{getAllData.c}}</span>
				</td>
				<td>
					<span ng-if="getAllData.cp_fix>0" class="high" id="otherCost">%{{getAllData.cp_fix}}</span>
					<span ng-if="getAllData.cp_fix<0" class="low" id="otherCost">%{{getAllData.cp_fix}}</span>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
	</div>
	</div>
</div>
</div>
<?php
	echo $args['after_widget'];
}
public function form($instance){
	if(isset($instance['title'])){
		$title = $instance['title'];
	}else{
		$title = __('New title','wpd_widget_domain');
	}


?>
<p>
<label for="<?php echo $this->get_field_id('title');?>"><?php _e("Title:"); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

</p>
<?php
}
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class shareMarket ends here

//add scripts files in widget

// Register and load the widget

function wpb_load_widget() {
    register_widget( 'shareMarket_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
function addScriptsAndStyles(){
	wp_register_style( 'css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
	wp_enqueue_style( 'css' );
	wp_register_style( 'bootstrapcss', plugins_url( 'shareMarket/css/examples.css' ) );
	wp_enqueue_style( 'bootstrapcss' );
	wp_register_script('script', plugin_dir_url( __FILE__ ) . 'js/angularjs.js', false,1, false);
	wp_enqueue_script( 'script');
	wp_register_script('controller', plugin_dir_url( __FILE__ ) . 'js/controller/controller.js', false,1, false);
	wp_enqueue_script( 'controller');
	wp_register_script('factory', plugin_dir_url( __FILE__ ) . 'js/factory/factory.js', false,1, false);
	wp_enqueue_script( 'factory');
	wp_register_script('service', plugin_dir_url( __FILE__ ) . 'js/service/service.js', false,1, false);
	wp_enqueue_script( 'service');

	wp_register_script('jquery', plugin_dir_url( __FILE__ ) . 'js/jquery.js', array( 'jquery' ),1.8, true);
	wp_enqueue_script( 'jquery');
	wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ),1.8, true);
	wp_enqueue_script( 'bootstrap');	
	wp_register_script('flot', plugin_dir_url( __FILE__ ) . 'js/jquery.flot.js', false,1, false);
	wp_enqueue_script( 'flot');
}
add_action( 'wp_enqueue_scripts', 'addScriptsAndStyles', 999 )
?>
