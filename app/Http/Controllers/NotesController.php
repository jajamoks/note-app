<?php

namespace App\Http\Controllers;

use App\Note;
use App\Http\Resources\Note as NoteResource;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Note::class);
        return NoteResource::collection(request()->user()->notes);
    }

    public function store()
    {
        $this->authorize('create', Note::class);
        $note = request()->user()->notes()->create($this->validateData());
        return (new NoteResource($note))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Note $note)
    {
        $this->authorize('view', $note);
        return new NoteResource($note);
    }

    public function update(Note $note)
    {
        $this->authorize('update', $note);

        $note->update($this->validateData());

        return (new NoteResource($note))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        return response([], Response::HTTP_NO_CONTENT);
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
    }

}
