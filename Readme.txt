my_recipe.info.yml: Similar to the previous examples, 
updated with the autoload section specifying the src folder 
for autoloading.
src/Entity/Recipe.php: Defines the Recipe entity class extending 
ContentEntityBase. It includes code for defining base fields, 
pre-creation logic, entity type information, and uses an entity_reference 
field to link multiple images.
src/Recipe.module (optional): Similar to the previous examples, 
it defines hooks for creating the "recipe" bundle and avoids 
defining field information again, relying on the Recipe class definition.