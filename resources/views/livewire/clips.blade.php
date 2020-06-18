<div>
    <h4 class="mt-3">آخر المقاطع</h4>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col">الاسم</th>
            <th scope="col">شارك</th>
            <th scope="col">التاريخ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clips as $clip)
            <tr>
                <td><a href="/share/{{$clip->id}}" target="_blank">{{$clip->name}}</a></td>
                <td><a href="https://twitter.com/intent/tweet?text={{$clip->name}}&#10;&amp;url=https://3tabdance.com/share/{{$clip->id}}&amp;via=teahill_oman&amp;hashtags=عتاب_ترقص" class="social-button btn btn-primary" target="_blank"><span class="fab fa-twitter"></span></a></td>
                <td>{{$clip->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clips->links() }}
</div>
