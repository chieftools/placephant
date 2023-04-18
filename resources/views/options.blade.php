<x-layout>
    <x-slot:headerTags>
        <link rel=“canonical” href=“https://placephant.com/” >
    </x-slot:headerTags>
    <div id="placephant">
        <h1 class="text-blueaccent text-5xl mb-2"><a href="#options">#</a> Options with examples</h1>
        <p>
            See the <a class="underline text-blueaccent" href="#usage">basic usage</a> with the <a class="underline text-blueaccent" href="#filters">filters</a>, <a class="underline text-blueaccent" href="#fit">fit</a>, <a class="underline text-blueaccent" href="#name">name</a> options to define a specific image, format and style.
            And <a class="underline text-blueaccent" href="#examples">examples</a> to get to know all the options that can make you creative in using placephant.
        </p>
    </div>
    <div class="mt-8" id="usage">
        <h2 class="text-blueaccent text-3xl"><a href="#usage">#</a> Basic Usage</h2>
        <p>
            The basic version to get an image is to add an image with the wanted width and heigth in the path.
            <x-codeline>&lt;img src="//placephant.com/300/250"/&gt;</x-codeline><br>
            If you want a square image you can use one size. <x-codeline>&lt;img src="//placephant.com/300"/&gt;</x-codeline><br>
        </p>
        <p>
            It is possible to use 0 for one of the sizes, this will result in an image that keeps the original ratio. The maximum size that you can use is a width of {{$config['max_width'] ?? '??'}} and a height of {{$config['max_height'] ?? '??'}} any size above that will be set to the maximum.
        </p>
        <div class="mt-4" id="filters">
            <h3 class="text-blueaccent text-xl"><a href="#filters">#</a> Filters</h3>
            <p>
                There are two filter options:<br>
                The first option is <span class="bg-blue-200 p-0.5">greyscale</span> (you can also use <span class="bg-blue-200 p-0.5">g</span> or <span class="bg-blue-200 p-0.5">bw</span>).<br>
                The second option is <span class="bg-blue-200 p-0.5">sepia</span>.<br>
            </p>
            <p>
                You can add a query parameter to use a filter: <x-codeline>&lt;img src="//placephant.com/300/250?filter=greyscale"/&gt;</x-codeline>, or you can add it as first part before the sizes: <x-codeline>&lt;img src="//placephant.com/greyscale/300/250"/&gt;</x-codeline>
            </p>
        </div>
        <div class="mt-4" id="fit">
            <h3 class="text-blueaccent text-xl"><a href="#fit">#</a> Fit</h3>
            <p>
                With the fit option you can decide how the image will fit in the targeted size.
            </p>
            <ul>
                <li><span class="bg-blue-200 p-0.5">contain</span>: Resizes the image to fit within the width and height boundaries without cropping, distorting or altering the aspect ratio.</li>
                <li><span class="bg-blue-200 p-0.5">max</span>: Resizes the image to fit within the width and height boundaries without cropping, distorting or altering the aspect ratio, and will also not increase the size of the image if it is smaller than the output size.</li>
                <li><span class="bg-blue-200 p-0.5">fill</span>: Resizes the image to fit within the width and height boundaries without cropping or distorting the image, and the remaining space is filled with the background color. The resulting image will match the constraining dimensions.</li>
                <li><span class="bg-blue-200 p-0.5">fill-max</span>: Resizes the image to fit within the width and height boundaries without cropping but upscaling the image if it’s smaller. The finished image will have remaining space on either width or height (except if the aspect ratio of the new image is the same as the old image). The remaining space will be filled with the background color. The resulting image will match the constraining dimensions.</li>
                <li><span class="bg-blue-200 p-0.5">stretch</span>: Stretches the image to fit the constraining dimensions exactly. The resulting image will fill the dimensions, and will not maintain the aspect ratio of the input image.</li>
                <li><span class="bg-blue-200 p-0.5">crop</span>: Default. Resizes the image to fill the width and height boundaries and crops any excess image data. The resulting image will match the width and height constraints without distorting the image. See the crop page for more information.</li>
            </ul>
            <p>
                You can add the fit as a query parameter: <x-codeline>&lt;img src="//placephant.com/300/250?fit=max"/&gt;</x-codeline>.
            </p>
        </div>
        <div class="mt-4" id="name">
            <h3 class="text-blueaccent text-xl"><a href="#name">#</a> Name</h3>
            <p>
                With the name option you can decide to get a specific image from the <a href="{{route('imagelist')}}">Current ElePHPant photo's</a>.
            </p>
            <p>
                You can add the name as a query parameter: <x-codeline>&lt;img src="//placephant.com/300/250?name={{$imagelist->keys()->first()}}"/&gt;</x-codeline>.
            </p>
        </div>
    </div>
    <div id="examples" class="mt-10">
        <h2 class="text-blueaccent text-3xl"><a href="#examples">#</a> Examples</h2>
        <div class="flex flex-col md:flex-row mt-2">
            <div class="basis-full md:basis-1/4 text-lg">
                A square image of 100x100 in greyscale.
            </div>
            <div class="basis-full md:basis-1/2 mx-2">
                <ol>
                    <li>1. <x-codeline>&lt;img src="//placephant.com/greyscale/100"/&gt;</x-codeline>.</li>
                    <li>2. <x-codeline>&lt;img src="//placephant.com/greyscale/100/100"/&gt;</x-codeline>.</li>
                    <li>3. <x-codeline>&lt;img src="//placephant.com/100?filter=greyscale"/&gt;</x-codeline>.</li>
                    <li>4. <x-codeline>&lt;img src="//placephant.com/100/100?filter=greyscale"/&gt;</x-codeline>.</li>
                </ol>
            </div>
            <div class="basis-full md:basis-1/4">
                <img src="{{url('/greyscale/100')}}">
            </div>
        </div>
        <hr class="h-px my-8 bg-blueaccent border-0 opacity-50">
        <div class="flex flex-col md:flex-row mt-2">
            <div class="basis-full md:basis-1/4 text-lg">
                A square image of 300x150 in sepia.
            </div>
            <div class="basis-full md:basis-1/2 mx-2">
                <ol>
                    <li>1. <x-codeline>&lt;img src="//placephant.com/sepia/300/150"/&gt;</x-codeline>.</li>
                    <li>2. <x-codeline>&lt;img src="//placephant.com/300/150?filter=sepia"/&gt;</x-codeline>.</li>
                </ol>
            </div>
            <div class="basis-full md:basis-1/4">
                <img src="{{url('/sepia/300/150')}}">
            </div>
        </div>
        <hr class="h-px my-8 bg-blueaccent border-0 opacity-50">
        <div class="flex flex-col md:flex-row mt-2">
            <div class="basis-full md:basis-1/4 text-lg">
                An image that keeps the ratio with a 0 for the height.
            </div>
            <div class="basis-full md:basis-1/2 mx-2">
                <ol>
                    <li><x-codeline>&lt;img src="//placephant.com/250/0"/&gt;</x-codeline>.</li>
                </ol>
            </div>
            <div class="basis-full md:basis-1/4">
                <img src="{{url('/250/0')}}">
            </div>
        </div>
        <hr class="h-px my-8 bg-blueaccent border-0 opacity-50">
        <div class="flex flex-col md:flex-row mt-2">
            <div class="basis-full md:basis-1/4 text-lg">
                An image that use the fill option to have the full image.
            </div>
            <div class="basis-full md:basis-1/2 mx-2">
                <ol>
                    <li><x-codeline>&lt;img src="//placephant.com/300/200?fit=fill"/&gt;</x-codeline>.</li>
                </ol>
            </div>
            <div class="basis-full md:basis-1/4">
                <img src="{{url('/300/200?fit=fill')}}">
            </div>
        </div>
        <hr class="h-px my-8 bg-blueaccent border-0 opacity-50">
        <div class="flex flex-col md:flex-row mt-2">
            <div class="basis-full md:basis-1/4 text-lg">
                An image that use the stretch option to have the full image.
            </div>
            <div class="basis-full md:basis-1/2 mx-2">
                <ol>
                    <li><x-codeline>&lt;img src="//placephant.com/310/200?fit=stretch"/&gt;</x-codeline>.</li>
                </ol>
            </div>
            <div class="basis-full md:basis-1/4">
                <img src="{{url('/310/200?fit=stretch')}}">
            </div>
        </div>
        <hr class="h-px my-8 bg-blueaccent border-0 opacity-50">
        <div class="flex flex-col md:flex-row mt-2">
            <div class="basis-full md:basis-1/4 text-lg">
                An image that use the contain option to have the image without cropping, distorting or altering the aspect ratio.
            </div>
            <div class="basis-full md:basis-1/2 mx-2">
                <ol>
                    <li><x-codeline>&lt;img src="//placephant.com/320/200?fit=contain"/&gt;</x-codeline>.</li>
                </ol>
            </div>
            <div class="basis-full md:basis-1/4">
                <img src="{{url('/320/200?fit=contain')}}">
            </div>
        </div>
    </div>
</x-layout>
