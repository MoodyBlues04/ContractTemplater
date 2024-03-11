<?php

namespace App\Models\Helpers;

class TariffOptions
{
    public const CONTRACT_GENERATIONS = 'contract_generations';
    public const DOCS_LOAD = 'docs_load';

    public function __construct(private array $tariffOptions)
    {
    }

    public static function create(array $tariffOptions): self
    {
        return new self($tariffOptions);
    }

    public function getOptions(): array
    {
        return $this->tariffOptions;
    }

    public function getContractGenerations(): int
    {
        return $this->get(self::CONTRACT_GENERATIONS, 0);
    }

    public function getDocsLoad(): int
    {
        return $this->get(self::DOCS_LOAD, 0);
    }

    public function get(string $key, $default = null): mixed
    {
        return $this->tariffOptions[$key] ?? $default;
    }

    public function exists(string $key): bool
    {
        return null !== $this->get($key, null);
    }

    public function set(string $key, $value): void
    {
        $this->tariffOptions[$key] = $value;
    }
}
