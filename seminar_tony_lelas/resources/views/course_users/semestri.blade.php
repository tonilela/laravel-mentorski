
<?php
    if($user['status']=='redoviti'){

    $semestar='sem_redovni';}
    else{

    $semestar='sem_izvanredni';
}
foreach ($user->courses as $p){
        if($p[$semestar]==$sem){
            if($p->pivot->status=='ne'){



            ?>  <div class="panel-body" >


    <tr>
        <div class="child">
        {!! Form::open(['method'=> 'PUT','id'=>'polozio','route'=>['polozio',$user->id,$p->id,'stat'=>'da']]) !!}
        {{Form::button('<i class="glyphicon glyphicon-check"></i>', array('type' => 'submit', 'class' => ''))}}

        {!! Form::close() !!}
        </div>

<div class="child">
        {!! Form::open(['method'=> 'DELETE','id'=>'obrisi','route'=>['obrisi',$user->id,$p->id]]) !!}
        {{Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type' => 'submit', 'class' => ''))}}

        {!! Form::close() !!}
</div>

<div class="child">

        {{$p['ime']}}
</div>
    </tr>
<br>

    </div>
<hr style="margin-bottom:-4%;margin-top: 2%;">
    <?php

    }
else{

                ?>
<div class="panel-body" >


    <tr>
        <div class="child">
            {!! Form::open(['method'=> 'PUT','id'=>'polozio','route'=>['polozio',$user->id,$p->id,'stat'=>'ne']]) !!}
            {{Form::button('<i class="glyphicon glyphicon-ok"></i>', array('type' => 'submit', 'class' => ''))}}

            {!! Form::close() !!}
        </div>



        <div class="child">

            {{$p['ime']}}
        </div>
    </tr>
    <br>

</div>
<hr style="margin-bottom:-4%;margin-top: 2%;">

<?php

}


}
}
?>

