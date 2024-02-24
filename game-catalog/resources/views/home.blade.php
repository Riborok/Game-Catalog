@extends('layouts.app')

@section('title')
    Game Catalog
@endsection

@section('content')
    <div class="mt-3">

        <x-featurette
            title="Experience Realism Like Never Before"
            text="Step into a world where games are so lifelike, you'll forget where reality ends and imagination begins. Explore breathtakingly realistic graphics that blur the lines between the virtual and the real."
            image="https://coop-land.ru/uploads/posts/2020-06/1592483333_10-1080p.jpg"
            order="first"
        />

        <x-featurette
            title="The Power of Game Engines"
            text="Game developers harness the power of cutting-edge game engines to create stunning visual experiences. These engines provide the tools and frameworks necessary to build intricate worlds, realistic physics, and immersive gameplay."
            image="https://kevurugames.com/wp-content/uploads/2022/07/banner_article-1024x410.jpg"
            order="second"
        />

        <x-featurette
            title="Unleashing Creativity with Game Development Tools"
            text="Game development tools provide a creative playground for developers to bring their visions to life. From powerful game engines to intuitive level editors, these tools empower developers to create immersive worlds and engaging gameplay experiences."
            image="https://timeweb.com/media/articles/0001/08/thumb_7315_articles_standart.jpeg"
            order="first"
        />

        <x-featurette
            title="The Future of Gaming"
            text="As technology continues to evolve, the future of gaming looks more exciting than ever. Virtual reality, augmented reality, and artificial intelligence are reshaping the gaming landscape, promising even more immersive and realistic experiences for players."
            image="https://img.championat.com/s/732x488/news/big/d/p/eksperty-nazvali-igry-s-luchshej-grafikoj-v-2023-godu_17032600851997129902.jpg"
            order="second"
        />
    </div>
@endsection
