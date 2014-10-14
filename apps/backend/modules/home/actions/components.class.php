<?php

class homeComponents extends sfComponents {
    
    public function executeMenuTop(sfWebRequest $request) {
        //$this->modulesParents = LxModulePeer::getUserModule($this->getUser()->getAttribute('idProfile'));
        $modulesParents = LxModulePeer::getParents($this->getUser()->getAttribute('idProfile'));
        $this->html="<ul>";
		foreach ($modulesParents as $modulesParent):
                    if($modulesParent['module_id'] != 1000)
                    {
                        if($modulesParent['module_sf']){
                            $this->html.="<li>".link_to($modulesParent['module_name'],'@default_index?module='.$modulesParent['module_sf'],'style="padding-right: 30px !important;"');
                        }else{
                            $this->html.="<li><a href=\"#\" style=\"padding-right: 30px !important;\">".$modulesParent['module_name']."</a>";			
                        }		
                        if($modulesParent['module_id'] != 1)
                        {
                            $this->html.= $this->ArmarArbolHijo($modulesParent['module_id'],$this->getUser()->getAttribute('idProfile'), $this->getUser()->getAttribute('idUserPanel'));
                        }
			$this->html.="</li>";
                     }
		endforeach;
		$this->html.="</ul><br style='clear: left' />";
    }
    
    public function ArmarArbolHijo($id_padre="", $idProfile)
    {
	$htm_axu="";	
	$children = LxModulePeer::getModulesChildren($id_padre,$idProfile, $idUser);					
	if($children)
	{
		$htm_axu.="<ul>";
		foreach ($children as $subTmp)
		{
                    if($subTmp['module_id'] <> '30')
                    {
                        if($subTmp['module_sf']){
                            $htm_axu.="<li>".link_to($subTmp['module_name'],'@default_index?module='.$subTmp['module_sf']);
                        }else{
                            $htm_axu.="<li><a href=\"#\">".$subTmp['module_name']."</a>";
                        }
                    }
                    
                    $htm_axu.= $this->ArmarArbolHijo($subTmp['module_id'],$idProfile, $idUser);
                    $htm_axu.="</li>";
		}
		$htm_axu.="</ul>";
	}
	return $htm_axu;
    }
}
?>