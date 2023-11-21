<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Afspraken') }}
        </h2>
    </x-slot>

    <div class="py-12 px-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white rounded-md max-w-sm">
           
        </div>

        <div class="">
            <div class="bg-lightgreen overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mb-4">
                        <h2 class="text-2xl font-bold text-darkgreen mb-4">Afspraken deze week</h2>
                        {{-- <button class="bg-darkgreen text-lightgreen px-4 rounded-md">Volgende week</button> --}}
                    </div>
                    <div class="overflow-x-auto">
                       @if($allAppointments->count() > 0)
                       <table class="min-w-full">
                        <thead class="bg-lightgreen text-left text-xs font-semibold text-darktwogreen uppercase tracking-wider">
                            <tr class="">
                                <th class="px-6 py-3 rounded-tl-md rounded-bl-md">Naam</th>
                                <th class="px-6 py-3">Tijd</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Dienst</th>
                               
                                <th class="px-6 py-3">Klant naam</th>
                                <th class="px-6 py-3 rounded-tr-md rounded-br-md">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allAppointments as $appointment)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->services }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $appointment->user->name }}</td> 
                                <td class="px-6 py-4 whitespace-nowrap"> 
                                    <a href="{{ url('appointments/delete/'.$appointment->id)}}">Verwijderen</a>
                                    <a href="{{ url('edit/'.$appointment->id)}}">Bewerken</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    
                    @else
                        Er zijn nog geen afpraken
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
