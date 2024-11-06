<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    /**
     * Affiche le classement des utilisateurs par score.
     */
    public function leaderboard()
    {
        $users = User::orderByDesc('score')->take(10)->get();

        return view('leaderboard', compact('users'));
    }
}
