<?php

namespace App\Http\Controllers;

use App\Models\RekenVragen;
use Illuminate\Http\Request;

class RekenVragenController extends Controller
{
    // Display all questions (API)
    /**
     * Get all reken vragen.
     *
     * This endpoint retrieves a list of all reken vragen.
     *
     * @response 200 {
     *     "data": [
     *         {
     *             "id": 1,
     *             "vraag": "Wat is 2 + 2?",
     *             "antwoord": 4,
     *             "niveau": 1
     *         },
     *         {
     *             "id": 2,
     *             "vraag": "Wat is 3 x 3?",
     *             "antwoord": 9,
     *             "niveau": 2
     *         }
     *     ]
     * }
     */
    public function index()
    {
        $questions = RekenVragen::all();
        return response()->json($questions);
    }

    

    // Store a new question (API)
    public function store(Request $request)
    {
        $request->validate([
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|integer',
            'niveau' => 'required|integer',
        ]);

        RekenVragen::create($request->all());

        return redirect('/add-question')->with('success', 'Vraag toegevoegd');
    }

    // Show a specific question (API)
    public function show($id)
    {
        $question = RekenVragen::findOrFail($id);
        return response()->json($question);
    }

    // Update a specific question (API)
    public function update(Request $request, $id)
    {
        $request->validate([
            'vraag' => 'required|string|max:255',
            'antwoord' => 'required|integer',
            'niveau' => 'required|integer',
        ]);

        $question = RekenVragen::findOrFail($id);
        $question->update($request->all());

        return redirect()->route('questions.manage')->with('success', 'Vraag succesvol bijgewerkt!');
    }

    // Delete a specific question (API)
    public function destroy($id)
    {
        $question = RekenVragen::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.manage')->with('success', 'Vraag succesvol verwijderd!');
    }

    // Display all questions for management (Web)
    public function manage()
    {
        $questions = RekenVragen::all(); // Fetch all questions
        return view('manage-questions', compact('questions')); // Pass questions to view
    }

    // Edit a specific question (Web)
    public function edit($id)
    {
        $question = RekenVragen::findOrFail($id); // Find question by ID
        return view('edit-question', compact('question')); // Pass question to the view
    }

    
}
