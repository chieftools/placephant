<x-layout>
    <x-slot:headerTags>
        <link rel=“canonical” href=“https://placephant.com/images” >
    </x-slot:headerTags>
    <div class="" id="elephpants">
        <h1 class="text-blueaccent text-4xl mb-2"><a href="#elephpants">#</a> Current ElePHPant photos</h1>
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
    <div class="mt-6" id="newelephpants">
        <h2 class="text-blueaccent text-3xl"><a href="#newelephpants">#</a> New ElePHPant photos</h2>
        <p>
            If you want to add a new ElePHPant image to the collection you can create a Merge Request on <a class="underline text-blueaccent" href="https://gitlab.com/tjvb/placephant" target="_blank">GitLab</a> or a Pull Request on <a class="underline text-blueaccent" href="https://github.com/tjvb/placephant" target="_blank">GitHub</a>.
        </p>
        <ol>
            <li>You need to have the permission to share this image.</li>
            <li>You need to add the image in <x-codeline>storage/app/public/elephpants/</x-codeline></li>
            <li>You need to update the config in <x-codeline>config/placephant.php</x-codeline></li>
        </ol>
    </div>
</x-layout>
