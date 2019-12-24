<ul class="list-group" style="margin-top:12px;">
	<a class="list-group-item<?php if( $this->controller=='home' || empty($this->controller)){echo ' active';} ?>" href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i>&nbsp; Home</a>
	<a class="list-group-item<?php if( $this->controller=='eventos'){echo ' active';} ?>" href="<?=base_url()?>eventos"><i class="fa fa-th-list fa-fw"></i></i>&nbsp; Eventos</a>
	<a class="list-group-item<?php if( $this->controller=='pagamentos'){echo ' active';} ?>" href="<?=base_url()?>pagamentos"><i class="fa fa-dollar fa-fw"></i></i>&nbsp; Pagamentos</a>
	<a class="list-group-item<?php if( $this->controller=='relatorios'){echo ' active';} ?>" href="<?=base_url()?>relatorios"><i class="fa fa-book fa-fw"></i></i>&nbsp; Relatórios</a>
	<a class="list-group-item<?php if( $this->controller=='configuracoes'){echo ' active';} ?>" href="<?=base_url()?>configuracoes"><i class="fa fa-cog fa-fw"></i>&nbsp; Configurações</a>
</ul>