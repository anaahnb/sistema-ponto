@extends('layouts.app')

@section('content')

    @include('components.navbar')

    <div class="mx-auto max-w-7xl px-4 md:px-10 py-4 md:py-7">
        <div>
            <div class="flex items-center justify-between">
                <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800"> Feriado </p>
                <div class="flex items-center">
                    <button class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white"> Adicionar feriado </p>
                    </button>
                </div>
            </div>
        </div>

        <style>
            [x-cloak] {
                display: none;
            }
        </style>
        

        <div class="antialiased h-screen pt-8">
            <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div>
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="flex items-center justify-between py-2 px-6">
                            <div>
                                <span x-text="MONTH_NAMES[month]" class="text-lg font-bold text-gray-800"></span>
                                <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                            </div>
                            <div class="border rounded-lg px-1" style="padding-top: 2px;">
                                <button 
                                    type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center" 
                                    :class="{'cursor-not-allowed opacity-25': month == 0 }"
                                    :disabled="month == 0 ? true : false"
                                    @click="month--; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>  
                                </button>
                                <div class="border-r inline-flex h-6"></div>		
                                <button 
                                    type="button"
                                    class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1" 
                                    :class="{'cursor-not-allowed opacity-25': month == 11 }"
                                    :disabled="month == 11 ? true : false"
                                    @click="month++; getNoOfDays()">
                                    <svg class="h-6 w-6 text-gray-500 inline-flex leading-none"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>									  
                                </button>
                            </div>
                        </div>	
        
                        <div class="-mx-1 -mb-1">
                            <div class="flex flex-wrap" style="margin-bottom: -40px;">
                                <template x-for="(day, index) in DAYS" :key="index">	
                                    <div style="width: 14.26%" class="px-2 py-2">
                                        <div
                                            x-text="day" 
                                            class="text-gray-600 text-sm uppercase tracking-wide font-bold text-center"></div>
                                    </div>
                                </template>
                            </div>
        
                            <div class="flex flex-wrap border-t border-l">
                                <template x-for="blankday in blankdays">
                                    <div 
                                        style="width: 14.28%; height: 120px"
                                        class="text-center border-r border-b px-4 pt-2"	
                                    ></div>
                                </template>	
                                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">	
                                    <div style="width: 14.28%; height: 120px" class="px-4 pt-2 border-r border-b relative">
                                        <div
                                            x-text="date"
                                            class="inline-flex w-6 h-6 items-center justify-center cursor-pointer text-center leading-none rounded-full transition ease-in-out duration-100"
                                            :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700 hover:bg-blue-200': isToday(date) == false }"	
                                        ></div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <script>
                const MONTH_NAMES = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                const DAYS = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        
                function app() {
                    return {
                        month: '',
                        year: '',
                        no_of_days: [],
                        blankdays: [],
                        days: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        
                        initDate() {
                            let today = new Date();
                            this.month = today.getMonth();
                            this.year = today.getFullYear();
                            this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
                        },
        
                        isToday(date) {
                            const today = new Date();
                            const d = new Date(this.year, this.month, date);
        
                            return today.toDateString() === d.toDateString() ? true : false;
                        },
        
                        getNoOfDays() {
                            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
        
                            // find where to start calendar day of week
                            let dayOfWeek = new Date(this.year, this.month).getDay();
                            let blankdaysArray = [];
                            for ( var i=1; i <= dayOfWeek; i++) {
                                blankdaysArray.push(i);
                            }
        
                            let daysArray = [];
                            for ( var i=1; i <= daysInMonth; i++) {
                                daysArray.push(i);
                            }
                            
                            this.blankdays = blankdaysArray;
                            this.no_of_days = daysArray;
                        }
                    }
                }
            </script>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            </div>
                <p tabindex="0" class="focus:outline-none text-base text-lg font-bold leading-normal text-gray-800"> Feriados de Janeiro </p>
            </div>
        <div>

        
    
@endsection