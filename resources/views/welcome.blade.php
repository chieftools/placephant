<x-layout>
    <x-slot:headerTags>
        <link rel=“canonical” href=“https://placephant.com/” >
    </x-slot:headerTags>
    <div id="placephant">
        <h1 class="text-blueaccent text-5xl mb-2"><a href="#placephant">#</a> Placephant</h1>
        <p>
            Add simple placeholder with images of the different <a class="underline text-blueaccent" href="https://www.php.net/elephpant.php" target="_blank">ElePHPants</a>. You can use the placeholders while developing a new website till you have the needed images.
        </p>
    </div>
    <div class="mt-8" id="usage">
        <h2 class="text-blueaccent text-3xl"><a href="#usage">#</a> Usage</h2>
        <p>
            The basic version to get an image is to add an image with the wanted width and heigth in the path.
            <x-codeline>&lt;img src="//placephant.com/300/250"/&gt;</x-codeline><br>
            If you want a square image you can use one size. <x-codeline>&lt;img src="//placephant.com/300"/&gt;</x-codeline><br>
        </p>
        <p>
            It is possible to use 0 for one of the sizes, this will result in an image that keeps the original ratio. The maximum size that you can use is a width of {{$config['max_width'] ?? '??'}} and a height of {{$config['max_height'] ?? '??'}} any size above that will be set to the maximum.
        </p>
        <p>
            For more information about the different options and examples check the <a class="underline text-blueaccent" href="{{route('options')}}">options page</a>.
        </p>
    </div>
    <div id="examples" class="mt-10">
        <h2 class="text-blueaccent text-3xl"><a href="#examples">#</a> Examples</h2>
        <div class="flex flex-col md:flex-row mt-2">
            <div class="basis-full md:basis-1/4 m-1 place-items-center flex justify-center items-center">
                <img class="border-2" src="{{url('/350/250?fit=fill')}}" title="An image that use the fill option to have the full image." alt="An image that use the fill option to have the full image.">
            </div>
            <div class="basis-full md:basis-1/4 m-1 place-items-center flex justify-center items-center">
                <img class="border-2" src="{{url('/sepia/300/150')}}" title="A square image of 300x150 in sepia." alt="A square image of 300x150 in sepia.">
            </div>
            <div class="basis-full md:basis-1/4 m-1 place-items-center flex justify-center items-center">
                <img class="border-2" src="{{url('/250/0')}}" title="An image that keeps the ratio with a 0 for the height." alt="An image that keeps the ratio with a 0 for the height.">
            </div>
            <div class="basis-full md:basis-1/4 m-1 place-items-center flex justify-center items-center">
                <img class="border-2" src="{{url('/greyscale/150')}}" title="A square image of 150x150 in greyscale." alt="A square image of 150x150 in greyscale.">
            </div>
        </div>
    </div>
</x-layout>
