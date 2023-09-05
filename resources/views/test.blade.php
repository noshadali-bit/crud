@extends('layouts.main')
@section('content')
 
<section class="inner-banner inner-banner--overlay banner-alt">
    <div class="volume-toggle">
        <i class='bx bxs-volume-mute'></i>
    </div>
    <h2> Your browser does not support HTML5 video. </h2>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-con">
                    <?php App\Helpers\Helper::inlineEditable('h2', ['class' => ''], 'Thank you for joining ', 'WELCOMETXT11'); ?>z
                    <div class="banner-btn">
                    <?php App\Helpers\Helper::inlineEditable('p', ['class' => ''], 'Thank you for joining hands with us as we share the Good News with the lost Banjara people in the remote villages of India.', 'WELCOMETXT12'); ?>z
                        <div class="banner-btn">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
 
</style>
@endsection
@section('js')
<script type="text/javascript">


(()=>{
  /*in page css here*/

})()
</script>
@endsection