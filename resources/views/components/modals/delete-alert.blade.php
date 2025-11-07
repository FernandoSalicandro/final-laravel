   @props(['title', 'sub', 'textBtnSuccess', 'textBtnDanger'])
<div class="deleteAlert backdrop-blur-md fixed inset-0 z-50 hidden items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-2xl max-w-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{$title}}</h2>
        <h3 class="text-center text-gray-600 mb-6">{{$sub}}</h3>
        <div class="flex justify-center gap-3">
            <button data-action="confirm" class="w-full border border-green-700 bg-green-400 text-white font-semibold rounded-lg py-2 px-4 hover:bg-green-500 hover:shadow-lg transition-all">
                {{$textBtnSuccess}}
            </button>
            <button data-action="cancel" class="w-full border border-red-700 bg-red-400 text-white font-semibold rounded-lg py-2 px-4 hover:bg-red-500 hover:shadow-lg transition-all">
                {{$textBtnDanger}}
            </button>
        </div>
    </div>
</div>