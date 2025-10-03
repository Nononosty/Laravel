<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\Request;
use Exception;//7
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class EditionControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
   /* public function index()
    {
        return response(Edition::all());
    }*/
////////////////////////////////////////////////////////////////////////
    public function index(Request $request){
    return response(Edition::orderBy('id') // ← добавить эту строку
        ->limit($request->perpage ?? 5)
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get());
    }

    public function total(){
        return response(Edition::all()->count());
    }
////////////////////////////////////////////////////////////////////////
    public function show(string $id)
    {
        return response(Edition::find($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        //
    }*/
///////////////////////////////////////////////////////////////////////////////////77777777777
 /*   public function store(Request $request)
    {
        if (! Gate::allows('create-edition')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление издания',
            ], 403);
        }
        $validated = $request->validate([
            'name' => 'required|unique:editions|max:255',
            'image' => 'required|file'
        ]);
        $file = $request->file('image');
        $fileName = rand(1, 100000). '_' . $file->getClientOriginalName();
        try{
            $path = Storage::disk('s3')->putFileAs('edition_pictures', $file, $fileName);
            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch (Exception $e){
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
            ], 500);
        };
        $edition = new Edition($validated);
        $edition->picture_url = $fileUrl;
        $edition->save();
        return response()->json([
            'code' => 0,
            'message' => 'Издание успешно добавлено',
        ], 201);
    }*/

public function store(Request $request)
{
    if (! Gate::allows('create-edition')) {
        return response()->json([
            'code' => 1,
            'message' => 'У вас нет прав на добавление издания',
        ]);
    }

    $validated = $request->validate([
        'name' => 'required|unique:editions|max:255',
        'author' => 'required|max:255',
        'image' => 'required|file'
    ]);

    $file = $request->file('image');
    // Генерация уникального имени файла
    $fileName = rand(1, 100000) . '_' . $file->getClientOriginalName();

    try {
        // Загрузка файла в S3
        $path = Storage::disk('s3')->putFileAs('edition_pictures', $file, $fileName);

        // Если загрузка не удалась, $path будет false
        if ($path === false) {
            throw new Exception('Failed to upload file to S3. Path returned false.');
        }

        // Получение URL загруженного файла
        $fileUrl = "https://" . env('AWS_BUCKET') . ".storage.yandexcloud.net/" . $path;
    }
    catch (Exception $e){
        return response()->json([
            'code' => 2,
            'message' => 'S3 error: ' . $e->getMessage()
        ]);
    }

    try {
        // Вычисляем следующий ID вручную
        $maxId = Edition::max('id');
        $nextId = $maxId ? $maxId + 1 : 1;

        // Создание издания с указанием ID вручную
        $edition = new Edition();
        $edition->id = $nextId;
        $edition->name = $validated['name'];
        $edition->author = $validated['author'];
        $edition->picture_url = $fileUrl; //
        $edition->save();

        return response()->json([
            'code' => 0,
            'message' => 'Издание успешно добавлено',
            'image_url' => $fileUrl // Возвращаем URL картинки в ответе
        ]);

    } catch (Exception $e) {
        return response()->json([
            'code' => 3,
            'message' => 'Ошибка сохранения в базу данных: ' . $e->getMessage(),
        ]);
    }
}
    ////////////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
