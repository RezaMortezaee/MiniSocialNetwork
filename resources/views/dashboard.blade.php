@extends('layouts.master')

@section('content')
    <section class="row new-post">
        <br>
        <br>
        <div class="col-md-6 col-md-offset-3">
             <header><h3>What do you have to say?</h3></header>
                <form action="#">
                    <div class="form-group">
                        <textarea class='form-control' name="new-post" id="new-post" cols="30" rows="5" placeholser='Your Post'>

                        </textarea>
                    </div>
                    <button type='submit' class='btn btn-primary'>Create Post</button>
                </form>
             </div>
    </section>
    <br>
    <br>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...?</h3></header>
            <article class="post">
                <p> Lorem ea nostrud ullamco mollit. 
                    Et elit dolor elit labore id anim ea occaecat consectetur minim anim. 
                    Commodo laboris sunt incididunt laborum pariatur deserunt esse incididunt
                    exercitation anim irure qui eiusmod voluptate.</p>
                <div class="info">
                    Posted by Max on 12 Feb 2016    
                </div>            
                <div class="intraction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a></a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a> 
                </div>
            </article>
            <article class="post">
                <p> Lorem ea nostrud ullamco mollit. 
                    Et elit dolor elit labore id anim ea occaecat consectetur minim anim. 
                    Commodo laboris sunt incididunt laborum pariatur deserunt esse incididunt
                    exercitation anim irure qui eiusmod voluptate.</p>
                <div class="info">
                    Posted by Max on 12 Feb 2016    
                </div>            
                <div class="intraction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a></a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a> 
                </div>
            </article>
        </div> 
    </section>
@endsection

