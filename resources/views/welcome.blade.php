<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name=author content="Tobias van Beek">
        <meta name=description content="Placephant placeholder images with ElePHPants.">
        <meta property="og:site_name" content="Placephant placeholder images with ElePHPants." >
        <meta property="og:title" content="Placephant" >
        <meta name=og:description content="Placephant placeholder images with ElePHPants." >
        <meta property="og:image" content="https://placephant.com/1900/0" >
        <meta property="og:type" content="website" >

        <meta name=twitter:creator content="@tvbeek" >
        <meta property="twitter:title" content="Placephant" >
        <meta name=twitter:description content="Placephant placeholder images with ElePHPants." >

        <link rel=“canonical” href=“https://placephant.com/” >

        @if (!App::environment('production'))
            <meta name="robots" content="noindex">
        @endif

        <title>Placephant add ElePHPant placeholders to your development site.</title>
        <link rel="stylesheet" href="{{ tailwindcss('css/app.css') }}" >

        @if(config('sitesettings.matomo_site_id'))
        <link rel="dns-prefetch" href="//tjvbstat.nl">
        <link rel="preconnect" href="https://tjvbstat.nl">
        <!-- Matomo -->
        <script>
            var _paq = window._paq = window._paq || [];
            /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);
            (function() {
                var u="//tjvbstat.nl/";
                _paq.push(['setTrackerUrl', u+'matomo.php']);
                _paq.push(['setSiteId', '{{config('sitesettings.matomo_site_id')}}']);
                var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
            })();
        </script>
        <noscript><p><img src="//tjvbstat.nl/matomo.php?idsite={{config('sitesettings.matomo_site_id')}}&amp;rec=1" style="border:0;" alt="" /></p></noscript>
        <!-- End Matomo Code -->
        @endif
        <style>

            body {
                color: #212559;
                background-color: #f8fafc;
                /* Circuit Board #96c5ec, #f8fafc https://www.heropatterns.com/ opacity 0.1*/
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 304 304' width='304' height='304'%3E%3Cpath fill='%2396c5ec' fill-opacity='0.1' d='M44.1 224a5 5 0 1 1 0 2H0v-2h44.1zm160 48a5 5 0 1 1 0 2H82v-2h122.1zm57.8-46a5 5 0 1 1 0-2H304v2h-42.1zm0 16a5 5 0 1 1 0-2H304v2h-42.1zm6.2-114a5 5 0 1 1 0 2h-86.2a5 5 0 1 1 0-2h86.2zm-256-48a5 5 0 1 1 0 2H0v-2h12.1zm185.8 34a5 5 0 1 1 0-2h86.2a5 5 0 1 1 0 2h-86.2zM258 12.1a5 5 0 1 1-2 0V0h2v12.1zm-64 208a5 5 0 1 1-2 0v-54.2a5 5 0 1 1 2 0v54.2zm48-198.2V80h62v2h-64V21.9a5 5 0 1 1 2 0zm16 16V64h46v2h-48V37.9a5 5 0 1 1 2 0zm-128 96V208h16v12.1a5 5 0 1 1-2 0V210h-16v-76.1a5 5 0 1 1 2 0zm-5.9-21.9a5 5 0 1 1 0 2H114v48H85.9a5 5 0 1 1 0-2H112v-48h12.1zm-6.2 130a5 5 0 1 1 0-2H176v-74.1a5 5 0 1 1 2 0V242h-60.1zm-16-64a5 5 0 1 1 0-2H114v48h10.1a5 5 0 1 1 0 2H112v-48h-10.1zM66 284.1a5 5 0 1 1-2 0V274H50v30h-2v-32h18v12.1zM236.1 176a5 5 0 1 1 0 2H226v94h48v32h-2v-30h-48v-98h12.1zm25.8-30a5 5 0 1 1 0-2H274v44.1a5 5 0 1 1-2 0V146h-10.1zm-64 96a5 5 0 1 1 0-2H208v-80h16v-14h-42.1a5 5 0 1 1 0-2H226v18h-16v80h-12.1zm86.2-210a5 5 0 1 1 0 2H272V0h2v32h10.1zM98 101.9V146H53.9a5 5 0 1 1 0-2H96v-42.1a5 5 0 1 1 2 0zM53.9 34a5 5 0 1 1 0-2H80V0h2v34H53.9zm60.1 3.9V66H82v64H69.9a5 5 0 1 1 0-2H80V64h32V37.9a5 5 0 1 1 2 0zM101.9 82a5 5 0 1 1 0-2H128V37.9a5 5 0 1 1 2 0V82h-28.1zm16-64a5 5 0 1 1 0-2H146v44.1a5 5 0 1 1-2 0V18h-26.1zm102.2 270a5 5 0 1 1 0 2H98v14h-2v-16h124.1zM242 149.9V160h16v34h-16v62h48v48h-2v-46h-48v-66h16v-30h-16v-12.1a5 5 0 1 1 2 0zM53.9 18a5 5 0 1 1 0-2H64V2H48V0h18v18H53.9zm112 32a5 5 0 1 1 0-2H192V0h50v2h-48v48h-28.1zm-48-48a5 5 0 0 1-9.8-2h2.07a3 3 0 1 0 5.66 0H178v34h-18V21.9a5 5 0 1 1 2 0V32h14V2h-58.1zm0 96a5 5 0 1 1 0-2H137l32-32h39V21.9a5 5 0 1 1 2 0V66h-40.17l-32 32H117.9zm28.1 90.1a5 5 0 1 1-2 0v-76.51L175.59 80H224V21.9a5 5 0 1 1 2 0V82h-49.59L146 112.41v75.69zm16 32a5 5 0 1 1-2 0v-99.51L184.59 96H300.1a5 5 0 0 1 3.9-3.9v2.07a3 3 0 0 0 0 5.66v2.07a5 5 0 0 1-3.9-3.9H185.41L162 121.41v98.69zm-144-64a5 5 0 1 1-2 0v-3.51l48-48V48h32V0h2v50H66v55.41l-48 48v2.69zM50 53.9v43.51l-48 48V208h26.1a5 5 0 1 1 0 2H0v-65.41l48-48V53.9a5 5 0 1 1 2 0zm-16 16V89.41l-34 34v-2.82l32-32V69.9a5 5 0 1 1 2 0zM12.1 32a5 5 0 1 1 0 2H9.41L0 43.41V40.6L8.59 32h3.51zm265.8 18a5 5 0 1 1 0-2h18.69l7.41-7.41v2.82L297.41 50H277.9zm-16 160a5 5 0 1 1 0-2H288v-71.41l16-16v2.82l-14 14V210h-28.1zm-208 32a5 5 0 1 1 0-2H64v-22.59L40.59 194H21.9a5 5 0 1 1 0-2H41.41L66 216.59V242H53.9zm150.2 14a5 5 0 1 1 0 2H96v-56.6L56.6 162H37.9a5 5 0 1 1 0-2h19.5L98 200.6V256h106.1zm-150.2 2a5 5 0 1 1 0-2H80v-46.59L48.59 178H21.9a5 5 0 1 1 0-2H49.41L82 208.59V258H53.9zM34 39.8v1.61L9.41 66H0v-2h8.59L32 40.59V0h2v39.8zM2 300.1a5 5 0 0 1 3.9 3.9H3.83A3 3 0 0 0 0 302.17V256h18v48h-2v-46H2v42.1zM34 241v63h-2v-62H0v-2h34v1zM17 18H0v-2h16V0h2v18h-1zm273-2h14v2h-16V0h2v16zm-32 273v15h-2v-14h-14v14h-2v-16h18v1zM0 92.1A5.02 5.02 0 0 1 6 97a5 5 0 0 1-6 4.9v-2.07a3 3 0 1 0 0-5.66V92.1zM80 272h2v32h-2v-32zm37.9 32h-2.07a3 3 0 0 0-5.66 0h-2.07a5 5 0 0 1 9.8 0zM5.9 0A5.02 5.02 0 0 1 0 5.9V3.83A3 3 0 0 0 3.83 0H5.9zm294.2 0h2.07A3 3 0 0 0 304 3.83V5.9a5 5 0 0 1-3.9-5.9zm3.9 300.1v2.07a3 3 0 0 0-1.83 1.83h-2.07a5 5 0 0 1 3.9-3.9zM97 100a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-48 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 96a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-144a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm96 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM49 36a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-32 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM33 68a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 240a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm80-176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 48a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm112 176a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-16 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 180a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 16a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0-32a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16 0a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM17 84a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm32 64a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm16-16a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'%3E%3C/path%3E%3C/svg%3E");
            }

        </style>
    </head>
    <body>
    <div class="container mx-auto w-full border-blue border-2 mt-6 px-10">
        <div id="placephant">
            <h1 class="text-blueaccent text-5xl"><a href="#placephant">#</a> Placephant</h1>
            <p>
                Add simple placeholder with images of the different <a class="underline text-blueaccent" href="https://www.php.net/elephpant.php" target="_blank">ElePHPants</a>. You can use the placeholders while developing a new website till you have the needed images.
            </p>
        </div>
        <div class="mt-4" id="usage">
            <h2 class="text-blueaccent text-3xl"><a href="#usage">#</a> Usage</h2>
            <p>
                The basic version to get an image is to add an image with the wanted width and heigth in the path.
                <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/300/250"/&gt;</span><br>
                If you want a square image you can use one size. <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/300"/&gt;</span><br>
            </p>
            <p>
                It is possible to use 0 for one of the sizes, this will result in an image that keeps the original ratio. The maximum size that you can use is a width of {{$config['max_width'] ?? '??'}} and a height of {{$config['max_height'] ?? '??'}} any size above that will be set to the maximum.
            </p>
            <div class="mt-4" id="filters">
                <h3 class="text-blueaccent text-2xl"><a href="#filters">#</a> Filters</h3>
                <p>
                    There are two filter options:<br>
                    The first option is <span class="bg-blue-200 p-0.5">greyscale</span> (you can also use <span class="bg-blue-200 p-0.5">g</span> or <span class="bg-blue-200 p-0.5">bw</span>).<br>
                    The second option is <span class="bg-blue-200 p-0.5">sepia</span>.<br>
                </p>
                <p>
                    You can add a query parameter to use a filter: <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/300/250?filter=greyscale"/&gt;</span>, or you can add it as first part before the sizes: <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/greyscale/300/250"/&gt;</span>
                </p>
            </div>
            <div class="mt-4" id="fit">
                <h3 class="text-blueaccent text-2xl"><a href="#fit">#</a> Fit</h3>
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
                    You can add the fit as a query parameter: <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/300/250?fit=max"/&gt;</span>.
                </p>
            </div>
        </div>
        <div id="examples" class="mt-4">
            <h2 class="text-blueaccent text-3xl"><a href="#examples">#</a> Examples</h2>
            <div class="flex flex-col md:flex-row mt-2">
                <div class="basis-full md:basis-1/4 text-lg">
                    A square image of 100x100 in greyscale.
                </div>
                <div class="basis-full md:basis-1/2 mx-2">
                    <ol>
                        <li>1. <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/greyscale/100"/&gt;</span>.</li>
                        <li>2. <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/greyscale/100/100"/&gt;</span>.</li>
                        <li>3. <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/100?filter=greyscale"/&gt;</span>.</li>
                        <li>4. <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/100/100?filter=greyscale"/&gt;</span>.</li>
                    </ol>
                </div>
                <div class="basis-full md:basis-1/4">
                    <img src="/greyscale/100">
                </div>
            </div>
            <div class="flex flex-col md:flex-row mt-2">
                <div class="basis-full md:basis-1/4 text-lg">
                    A square image of 300x150 in sepia.
                </div>
                <div class="basis-full md:basis-1/2 mx-2">
                    <ol>
                        <li>1. <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/sepia/300/150"/&gt;</span>.</li>
                        <li>2. <span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/300/150?filter=sepia"/&gt;</span>.</li>
                    </ol>
                </div>
                <div class="basis-full md:basis-1/4">
                    <img src="/sepia/300/150">
                </div>
            </div>
            <div class="flex flex-col md:flex-row mt-2">
                <div class="basis-full md:basis-1/4 text-lg">
                    An image that keeps the ratio with a 0 for the height.
                </div>
                <div class="basis-full md:basis-1/2 mx-2">
                    <ol>
                        <li><span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/250/0"/&gt;</span>.</li>
                    </ol>
                </div>
                <div class="basis-full md:basis-1/4">
                    <img src="/250/0">
                </div>
            </div>
            <div class="flex flex-col md:flex-row mt-2">
                <div class="basis-full md:basis-1/4 text-lg">
                    An image that use the fill option to have the full image.
                </div>
                <div class="basis-full md:basis-1/2 mx-2">
                    <ol>
                        <li><span class="bg-gray-300 p-0.5">&lt;img src="//placephant.com/350/250?fit=fill"/&gt;</span>.</li>
                    </ol>
                </div>
                <div class="basis-full md:basis-1/4">
                    <img src="/350/250?fit=fill">
                </div>
            </div>
        </div>
        <div class="mt-6" id="elephpants">
            <h2 class="text-blueaccent text-3xl"><a href="#elephpants">#</a> Current ElePHPant photos</h2>
            <p>Click on a photo to see the original file, the link will open in a new window.</p>
            <table class="table-auto">
                <tr class="border-2">
                    <th>Name</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Original Image</th>
                </tr>
                @foreach($imagelist as $name => $imageData)
                    <tr class="border-2">
                        <td class="px-4">{{$name}}</td>
                        <td class="px-4">{{$imageData->author}}</td>
                        <td class="px-4">{{$imageData->description}}</td>
                        <td class="px-4"><a href="{{url('storage/elephpants/'. $imageData->filename)}}" target="_blank"><img src="{{url('/0/125?name='.$name)}}"></a> </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-6 mb-6" id="credits">
            <h2 class="text-blueaccent text-3xl"><a href="#credits">#</a> Credits</h2>
            <p>
                Placephant is a project created and hosted by <a class="text-blueaccent" href="https://tjvb.nl/about" target="_blank">Tobias van Beek</a>.
            </p>
            <p>
                The inspiration is from the previous project <a class="underline text-blueaccent" href="https://github.com/erikaheidi/placephant" target="_blank">https://github.com/erikaheidi/placephant</a> created by <a href="https://eheidi.dev/p/about" target="_blank"  class="text-blueaccent">Erika Heidi</a>.
            </p>
            <p>
                The author of the Elephpant images are listed in the <a  class="text-blueaccent" href="#elephpants">Current ElePHPant photos</a> section.
            </p>
            <p>
                This project couldn't exist with the creation of the ElePHPants by <a class="text-blueaccent" href="http://www.elroubio.net/" target="_blank">Vincent Pontier</a>
            </p>
            <p>
                Without <a class="text-blueaccent" href="https://www.php.net/" target="_blank">PHP</a> this website would not work and the ElePHPants would never have existed.
            </p>
        </div>
    </div>
    </body>
</html>
