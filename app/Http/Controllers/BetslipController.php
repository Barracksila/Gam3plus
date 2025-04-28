<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Betslip;
use App\Models\Winner;
use App\Models\Loser;

class BetslipController extends Controller
{
    // Store newly created betslip
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'player_1_id' => 'required|exists:users,id',
            'player_2_id' => 'required|exists:users,id',
            'player_1_score' => 'required|numeric',
            'player_2_score' => 'required|numeric',
            'bet_amount' => 'required|numeric',
            'teams' => 'required',
        ]);

        // Create a new betslip
        $betslip = Betslip::create([
            'user_id' => Auth::id(),
            'player_1_id' => $request->player_1_id,
            'player_2_id' => $request->player_2_id,
            'player_1_score' => $request->player_1_score,
            'player_2_score' => $request->player_2_score,
            'bet_amount' => $request->bet_amount,
            'outcome' => '', // Outcome will be set after comparison
        ]);

        // Determine the outcome of the bet
        if ($betslip->player_1_score > $betslip->player_2_score) {
            // Player 1 wins
            $betslip->outcome = 'win';
            $betslip->save();

            // Store the winner and loser details
            $this->storeWinner($betslip, $betslip->player_1_id);
            $this->storeLoser($betslip, $betslip->player_2_id);

            return response()->json([
                'message' => 'Player 1 wins!',
                'betslip' => $betslip,
            ]);
        } elseif ($betslip->player_1_score < $betslip->player_2_score) {
            // Player 2 wins
            $betslip->outcome = 'Lose ';
            $betslip->save();

            // Store the winner and loser details
            $this->storeWinner($betslip, $betslip->player_2_id);
            $this->storeLoser($betslip, $betslip->player_1_id);

            return response()->json([
                'message' => 'Player 2 wins!',
                'betslip' => $betslip,
            ]);
        } else {
            // It's a draw
            $betslip->outcome = 'draw';
            $betslip->save();

            return response()->json([
                'message' => 'It\'s a draw!',
                'betslip' => $betslip,
            ]);
        }
    }

    // Store the winner in the winners table
    protected function storeWinner(Betslip $betslip, $winner_id)
    {
        // Example calculation: Winner gets double the bet amount
        $winningAmount = $betslip->bet_amount * 2;

        // Store winner information
        Winner::create([
            'betslip_id' => $betslip->id,
            'user_id' => $winner_id,
            'winning_amount' => $winningAmount,
        ]);
    }

    // Store the loser in the losers table
    protected function storeLoser(Betslip $betslip, $loser_id)
    {
        // You can add specific reasons for losing, or just track the player
        Loser::create([
            'betslip_id' => $betslip->id,
            'user_id' => $loser_id,
            'reason' => 'Better luck next time!',
        ]);
    }

    // Retrieve all betslips for the logged-in user
    public function index()
    {
        $betslips = Betslip::where('user_id', Auth::id())->get();

        return response()->json([
            'betslips' => $betslips,
        ]);
    }

    // Retrieve a single betslip
    public function show($id)
    {
        $betslip = Betslip::findOrFail($id);

        // Check if the betslip belongs to the logged-in user
        if ($betslip->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json([
            'betslip' => $betslip,
        ]);
    }

    // Delete a betslip
    public function destroy($id)
    {
        $betslip = Betslip::findOrFail($id);

        // Check if the betslip belongs to the logged-in user
        if ($betslip->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $betslip->delete();

        return response()->json([
            'message' => 'Betslip deleted successfully',
        ]);
    }
}
