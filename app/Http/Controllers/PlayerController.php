<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all(); // Fetch all players from DB
        return response()->json($players);
    }



   public function show($id)
{
    $player = Player::find($id);

    if (!$player) {
        return response()->json(['message' => 'Player not found'], 404);
    }

    return response()->json([
        'id' => $player->Player_id,
        'username' => $player->Player_Name,
        'cash' => 12500, // Add from DB if you want, or hardcode for now
        'btc' => 0.85,
        'country' => $player->Country,
        'avatar' => $player->Avatar,
        'countryFlag' => 'https://flagcdn.com/' . strtolower($player->Country) . '.svg'
    ]);
}

    // Update player
    public function change(Request $request, $id)
    {
        $player = Player::find($id);
        if (!$player) {
            return response()->json(['message' => 'Player not found'], 404);
        }

        $request->validate([
    'Player_Name' => 'required|string|max:255',
    'Country' => 'required|string',
    'Phone_Number' => 'required|string|max:20',
    'email' => 'nullable|email'
]);

$player->update($request->only(['Player_Name', 'Country', 'Phone_Number', 'email']));



        $player->update($request->all());

        return response()->json(['message' => 'Player updated successfully']);
    }

    // Soft delete player
    public function destroy($id)
    {
        $player = Player::find($id);
        if (!$player) {
            return response()->json(['message' => 'Player not found.'], 404);
        }
        $player->delete();
        return response()->json(['message' => 'Player deleted successfully.']);
    }
}
