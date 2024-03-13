<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    public static array $category = ['IT', 'Sales', 'Marketing', 'Engineer', 'Artist'];
    public static array $experience = ['entry', 'intermidate', 'senior'];
    public $fillable = ['title', 'description', 'location', 'category', 'experience', 'salary'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function scopeFilter(QueryBuilder | EloquentBuilder $builder, array $filter): QueryBuilder | EloquentBuilder
    {
        $builder->when($filter['search'] ?? null, function ($query, $search) {
            $query->where(function ($cq) use ($search) {
                $cq->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhereHas('employer', function ($query) use ($search) {
                        $query->where('company_name', 'like', '%' . $search . '%');
                    });
            });
        })
            ->when($filter['salary_from'] ?? null, function ($query, $salary_from) {
                $query->where('salary', '>=', $salary_from);
            })
            ->when($filter['salary_to'] ?? null, function ($query, $salary_to) {
                $query->where('salary', '<=', $salary_to);
            })
            ->when($filter['experience'] ?? null, function ($query, $exp) {
                $query->where('experience', $exp);
            })
            ->when($filter['category'] ?? null, function ($query, $category) {
                $query->where('category', $category);
            });

        return $builder;
    }

    public function hasApplied(Authenticatable | User | int $user): bool
    {
        return Application::where('user_id', $user->id ?? $user)->where('job_id', $this->id)->exists();
    }
}
