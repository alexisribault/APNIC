const { render, useState, useEffect } = wp.element;
import Link from '@material-ui/core/Link';
import { Divider, Box } from "@material-ui/core";
import { Pagination } from '@material-ui/lab';
import { DragDropContext, Droppable, Draggable } from "react-beautiful-dnd";

const reorder = (list, startIndex, endIndex) => {
  const result = Array.from(list);
  const [removed] = result.splice(startIndex, 1);
  result.splice(endIndex, 0, removed);

  return result;
};

function VirtualLab({ virtualLab, index }) {
  return (
    <Draggable draggableId={`id-${virtualLab.id}`} index={index}>
      {provided => (
        <div
          ref={provided.innerRef}
          {...provided.draggableProps}
          {...provided.dragHandleProps}
        >
          <div className="virtual-lab-item">
            <div>
              <img className="virtual-lab-item__thumbnail" src={virtualLab.thumbnail} />
            </div>
            <div className="virtual-lab-item__content">
              <div>
              <Link target="a_blank" href={virtualLab.viewDetailsURL}>{virtualLab.name}</Link>
              </div>
              <small>{virtualLab.description.substring(0,100)}</small>
            </div>
          </div>
        </div>
      )}
    </Draggable>
  );
}

const App = () => {

  const itemsPerPage = 10;
  const [page, setPage] = React.useState(1);
  const [virtualLabs, setVirtualLabs] = useState([]);

  useEffect(() => {
    async function loadPage() {
        const response = await fetch('https://academy.apnic.net/wp-json/academy/virtual-labs');

        if(!response.ok) {
            // something went wrong
            return;
        }
        const virtualLabsResponse = await response.json();

        setVirtualLabs(virtualLabsResponse.virtualLabs);
    }
  
    loadPage();
  }, [])

  const handleChange = (event, value) => {
    setPage(value);
  };

  function onDragEnd(result) {
    if (!result.destination) {
      return;
    }

    if (result.destination.index === result.source.index) {
      return;
    }

    const virtualLabsReorder = reorder(
      virtualLabs,
      result.source.index,
      result.destination.index
    );

    setVirtualLabs(virtualLabsReorder);
  }

  return (
    <div>
    <DragDropContext onDragEnd={onDragEnd}>
        <Droppable droppableId="list">
        {provided => (
            <div ref={provided.innerRef} {...provided.droppableProps}>
              {virtualLabs
                .map((virtualLab, index) => (
                  // only show items that are in the right page
                  Math.ceil((index + 1) / itemsPerPage) === page ? <VirtualLab virtualLab={virtualLab} index={index} key={`id-${virtualLab.id}`} /> : ''
              ))}
              {provided.placeholder}
            </div>
          )}
        </Droppable>
    </DragDropContext>
       <Divider />
       <Box component="span">
         <Pagination
           count={Math.ceil(virtualLabs.length / itemsPerPage)}
           page={page}
           onChange={handleChange}
           defaultPage={1}
           color="primary"
           size="large"
           showFirstButton
           showLastButton
         />
       </Box>
    </div>
  );
};
render(<App />, document.getElementById(`react-app`));
