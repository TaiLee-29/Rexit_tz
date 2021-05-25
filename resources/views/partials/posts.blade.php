
<h1><a href="{{route('show', $post)}}">{{$post->title}}</a></h1><td><form action="/post/{{$post->id}}/update" >
        <input type="submit" value="update" >@csrf</form>
</td><td><form action="/post/{{$post->id}}/delete" method="post">
        <input type="submit" value="delete" >@csrf</form></td>
<p>{{$post->body}}</p>
