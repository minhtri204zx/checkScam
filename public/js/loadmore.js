$(document).ready(function () {
    var offset = 12;
    $('#load-more').click(function () {
        $.ajax({
            url: '/load-more',
            method: 'GET',
            data: {
                offset: offset
            },
            success: function (data) {
                if (data.length > 0) {
                    var html = '';
                    $.each(data, function (index, product) {
                        html += `
                            <a href="posts/{{ $post->id }}" class="none">

<div class="content">
    <p><img src="{{ asset('images/content/Profile.svg') }}" alt=""><span>Họ và tên :</span>
        {{ $post->fullname }}</p>
    <p><img src="{{ asset('images/content/password.svg') }}" alt=""><span>Username:</span>
        {{ $post->username }}</p>
    <button class="text-center">
        Xem chi tiết &nbsp; &nbsp;
        <span><img src="{{ asset('images/content/view.svg') }}" alt=""> {{ $post->views($post->id) }}</span>
    </button>
    @if ($post->status == 'Phốt')
        <img src="{{ asset('images/content/phot.png') }}" alt="">
    @else
        <img src="{{ asset('images/content/scam.png') }}" alt="">
    @endif
</div>

</a>
                            `;
                    });
                    $('.none').append(html);

                    offset += 12;
                } else {
                    $('#load-more').text('Không còn sản phẩm nào').prop('disabled',
                        true);
                }
            }
        });
    });
});



