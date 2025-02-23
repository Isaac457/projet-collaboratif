<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    /**
     * Déterminer si l'utilisateur peut voir un projet.
     */
    public function view(User $user, Project $project): bool
    {
        return $user->id === $project->owner_id;
    }

    /**
     * Déterminer si l'utilisateur peut modifier un projet.
     */
    public function update(User $user, Project $project): bool
    {
        return $user->id === $project->owner_id;
    }

    /**
     * Déterminer si l'utilisateur peut supprimer un projet.
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->id === $project->owner_id;
    }
}
