@extends('notice.layout')

@section('content')
    <form method="post" action="/notice" class="form-horizontal">
        @csrf
        <fieldset>
        
            <!-- Form Name -->
            <legend>新增活動</legend>

            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="acativity_name">活動名稱</label>  
            <div class="col-md-4">
            <input id="acativity_name" name="acativity_name" type="text" placeholder="" class="form-control input-md" required="">
                
            </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="activity_time">活動日期/時間</label>  
            <div class="col-md-4">
            <input id="activity_time" name="activity_time" type="text" placeholder="2018-01-01 00:00:00" class="form-control input-md" required="">
                
            </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="activity_content">活動內容</label>  
            <div class="col-md-4">
            <input id="activity_content" name="activity_content" type="text" placeholder="" class="form-control input-md">
                
            </div>
            </div>
            
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="button1id"></label>
                <div class="col-md-8">
                    <button id="button1id"  type="submit" name="button1id" class="btn btn-warning">取消</button>
                    <button id="btn_send" type="submit" name="btn_send" class="btn btn-success">送出</button>
                </div>
            </div>
        
        </fieldset>
    </form>
        