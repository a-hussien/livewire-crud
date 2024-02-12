<div class="container mx-auto flex flex-col">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 my-4">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table class="min-w-full text-left text-sm font-light">
          <thead class="border-b font-medium">
            <tr>
              <th scope="col" class="px-6 py-4">#</th>
              <th scope="col" class="px-6 py-4">Name</th>
              <th scope="col" class="px-6 py-4">Email</th>
              <th scope="col" class="px-6 py-4">Class</th>
              <th scope="col" class="px-6 py-4">Section</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="border-b transition duration-300 ease-in-out hover:bg-neutral-100">
              <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
              <td class="whitespace-nowrap px-6 py-4">Mark</td>
              <td class="whitespace-nowrap px-6 py-4">Otto</td>
              <td class="whitespace-nowrap px-6 py-4">@mdo</td>
              <td class="whitespace-nowrap px-6 py-4">@mdo</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
