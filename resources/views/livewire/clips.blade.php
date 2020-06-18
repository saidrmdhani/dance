<div>
    <h4 class="mt-3">آخر المقاطع</h4>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col">الاسم</th>
            <th scope="col">التاريخ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clips as $clip)
            <tr>
                <td><a href="/storage/{{$clip->file}}" target="_blank">{{$clip->name}}</a></td>
                <td>{{$clip->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clips->links() }}
</div>
