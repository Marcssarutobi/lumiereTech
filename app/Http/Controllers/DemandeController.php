<?php

namespace App\Http\Controllers;

use App\Mail\ContactAdmin;
use App\Mail\DemandeAdmin;
use App\Mail\DemandeCustomer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class DemandeController extends Controller
{
    /**
     * Champs techniques anti-spam envoyés par le formulaire (jamais transmis aux e-mails).
     */
    private const SPAM_FIELDS = ['website', 'filled_in'];

    /**
     * Règles communes anti-spam :
     *  - website   : champ "pot de miel" invisible, un humain ne le remplit jamais
     *  - filled_in : secondes passées sur le formulaire (un robot soumet en moins de 3 s)
     */
    private function spamRules(): array
    {
        return [
            'website' => ['nullable', 'string', 'max:255'],
            'filled_in' => ['required', 'integer', 'min:3', 'max:86400'],
        ];
    }

    private const SPAM_MESSAGES = [
        'filled_in.required' => 'Veuillez recharger la page puis réessayer.',
        'filled_in.min' => 'Veuillez prendre le temps de remplir le formulaire.',
    ];

    /**
     * Trop de liens dans un message = signature classique du spam.
     */
    private function hasTooManyLinks(string $text): bool
    {
        return preg_match_all('~https?://|www\.~i', $text) > 2;
    }

    public function storeDemande(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'phone' => ['required', 'string', 'regex:/^[0-9+().\-\s]{6,30}$/'],
            'service' => ['required', 'string', 'max:150'],
            'entreprise' => ['required', 'string', 'max:150'],
            'activite' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ] + $this->spamRules(), self::SPAM_MESSAGES);

        // Robot détecté : on répond "succès" sans rien envoyer, pour ne pas l'aider à s'adapter
        if (! empty($validated['website']) || $this->hasTooManyLinks($validated['message'])) {
            return response()->json(['message' => 'Demande submitted successfully']);
        }

        $data = Arr::except($validated, self::SPAM_FIELDS);

        Mail::to($data['email'])->send(new DemandeCustomer($data));
        Mail::to('lumtechnologieexpertise@gmail.com')->send(new DemandeAdmin($data));

        return response()->json(['message' => 'Demande submitted successfully']);
    }

    public function storeContact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'phone' => ['required', 'string', 'regex:/^[0-9+().\-\s]{6,30}$/'],
            'sujet' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ] + $this->spamRules(), self::SPAM_MESSAGES);

        if (! empty($validated['website']) || $this->hasTooManyLinks($validated['message'])) {
            return response()->json(['message' => 'Contact submitted successfully']);
        }

        $data = Arr::except($validated, self::SPAM_FIELDS);

        Mail::to('lumtechnologieexpertise@gmail.com')->send(new ContactAdmin($data));

        return response()->json(['message' => 'Contact submitted successfully']);
    }
}
