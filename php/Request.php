<?php
declare(strict_types=1);

final class Request
{
    private string $info;
    public function __construct(string $info)
	{
        $this->info = $info;
    }
    public function getInfo(): string
    {
        return $this->info;
    }
}
?>
